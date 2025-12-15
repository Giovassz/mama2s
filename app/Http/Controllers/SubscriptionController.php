<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Membresia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Exception\ApiErrorException;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Mostrar la página de selección de membresía para pagar
     */
    public function index()
    {
        $membresias = Membresia::activas()->ordenadas()->get();
        $cliente = Auth::user()->cliente ?? null;
        
        return view('subscriptions.index', compact('membresias', 'cliente'));
    }

    /**
     * Crear sesión de checkout de Stripe para pagar una membresía
     */
    public function checkout(Request $request, Membresia $membresia)
    {
        $user = Auth::user();
        $cliente = $user->cliente;

        if (!$cliente) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Debes tener un perfil de cliente para suscribirte.');
        }

        try {
            // Crear o obtener el cliente de Stripe
            if (!$cliente->stripe_customer_id) {
                $stripeCustomer = Customer::create([
                    'email' => $cliente->email,
                    'name' => $cliente->nombre_completo,
                    'metadata' => [
                        'cliente_id' => $cliente->id,
                        'user_id' => $user->id,
                    ],
                ]);

                $cliente->update([
                    'stripe_customer_id' => $stripeCustomer->id,
                ]);
            } else {
                $stripeCustomer = Customer::retrieve($cliente->stripe_customer_id);
            }

            // Crear el precio en Stripe (en modo demo/test)
            // En producción, estos precios deberían crearse previamente en el dashboard de Stripe
            $priceId = $this->getOrCreatePrice($membresia);

            // Crear sesión de checkout
            $checkoutSession = Session::create([
                'customer' => $stripeCustomer->id,
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $priceId,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('subscriptions.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscriptions.index'),
                'metadata' => [
                    'membresia_id' => $membresia->id,
                    'cliente_id' => $cliente->id,
                ],
            ]);

            return redirect($checkoutSession->url);
        } catch (ApiErrorException $e) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    /**
     * Manejar el éxito del pago
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'No se pudo verificar la sesión de pago.');
        }

        try {
            $session = Session::retrieve($sessionId);
            $cliente = Cliente::find($session->metadata->cliente_id ?? null);
            $membresia = Membresia::find($session->metadata->membresia_id ?? null);

            if (!$cliente || !$membresia) {
                return redirect()->route('subscriptions.index')
                    ->with('error', 'No se pudo encontrar la información de la suscripción.');
            }

            // Obtener la suscripción de Stripe
            $subscription = Subscription::retrieve($session->subscription);

            // Actualizar el cliente con la información de la suscripción
            $cliente->update([
                'membresia_id' => $membresia->id,
                'stripe_subscription_id' => $subscription->id,
                'subscription_status' => $subscription->status,
                'subscription_ends_at' => \Carbon\Carbon::createFromTimestamp($subscription->current_period_end),
            ]);

            return redirect()->route('subscriptions.index')
                ->with('success', '¡Suscripción activada exitosamente! Ahora tienes acceso a ' . $membresia->nombre);
        } catch (ApiErrorException $e) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Error al verificar el pago: ' . $e->getMessage());
        }
    }

    /**
     * Cancelar suscripción
     */
    public function cancel(Request $request)
    {
        $user = Auth::user();
        $cliente = $user->cliente;

        if (!$cliente || !$cliente->stripe_subscription_id) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'No tienes una suscripción activa.');
        }

        try {
            $subscription = Subscription::retrieve($cliente->stripe_subscription_id);
            $subscription->cancel();

            $cliente->update([
                'subscription_status' => 'canceled',
            ]);

            return redirect()->route('subscriptions.index')
                ->with('success', 'Suscripción cancelada exitosamente.');
        } catch (ApiErrorException $e) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Error al cancelar la suscripción: ' . $e->getMessage());
        }
    }

    /**
     * Obtener o crear un precio en Stripe para la membresía
     * En modo demo, creamos precios dinámicamente
     */
    private function getOrCreatePrice(Membresia $membresia)
    {
        // En modo demo/test, creamos un precio temporal
        // En producción, deberías tener precios predefinidos en Stripe
        try {
            // Intentar crear un precio
            $price = \Stripe\Price::create([
                'unit_amount' => (int)($membresia->precio * 100), // Convertir a centavos
                'currency' => 'usd',
                'recurring' => [
                    'interval' => $membresia->duracion_dias >= 30 ? 'month' : 'day',
                    'interval_count' => $membresia->duracion_dias >= 30 ? 1 : $membresia->duracion_dias,
                ],
                'product_data' => [
                    'name' => $membresia->nombre,
                    'description' => $membresia->descripcion ?? '',
                ],
            ]);

            return $price->id;
        } catch (ApiErrorException $e) {
            // Si falla, usar un precio de prueba de Stripe
            // Estos son precios de prueba que Stripe proporciona para testing
            // En producción, debes crear tus propios precios en el dashboard
            throw new \Exception('Error al crear el precio. Asegúrate de tener configuradas las claves de Stripe correctamente.');
        }
    }
}

