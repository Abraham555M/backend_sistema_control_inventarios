<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    // -------------------------------------------------------------------------
    // 2xx - Éxito
    // -------------------------------------------------------------------------

    /**
     * 200 OK - Solicitud exitosa
     */
    public static function ok(mixed $data = null, string $message = 'Success'): JsonResponse
    {
        return self::response(200, $message, $data);
    }

    /**
     * 201 Created - Recurso creado exitosamente
     */
    public static function created(mixed $data = null, string $message = 'Resource created successfully'): JsonResponse
    {
        return self::response(201, $message, $data);
    }

    /**
     * 202 Accepted - Solicitud aceptada pero no procesada aún
     */
    public static function accepted(mixed $data = null, string $message = 'Request accepted'): JsonResponse
    {
        return self::response(202, $message, $data);
    }

    /**
     * 204 No Content - Exitoso pero sin contenido que retornar
     */
    public static function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    // -------------------------------------------------------------------------
    // 3xx - Redirección
    // -------------------------------------------------------------------------

    /**
     * 301 Moved Permanently
     */
    public static function movedPermanently(string $url): JsonResponse
    {
        return self::response(301, 'Moved Permanently', ['url' => $url]);
    }

    /**
     * 302 Found / Redirect temporal
     */
    public static function redirect(string $url): JsonResponse
    {
        return self::response(302, 'Redirect', ['url' => $url]);
    }

    // -------------------------------------------------------------------------
    // 4xx - Errores del cliente
    // -------------------------------------------------------------------------

    /**
     * 400 Bad Request - Solicitud malformada o inválida
     */
    public static function badRequest(string $message = 'Bad Request', mixed $errors = null): JsonResponse
    {
        return self::error(400, $message, $errors);
    }

    /**
     * 401 Unauthorized - No autenticado
     */
    public static function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return self::error(401, $message);
    }

    /**
     * 403 Forbidden - Autenticado pero sin permisos
     */
    public static function forbidden(string $message = 'Forbidden'): JsonResponse
    {
        return self::error(403, $message);
    }

    /**
     * 404 Not Found - Recurso no encontrado
     */
    public static function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return self::error(404, $message);
    }

    /**
     * 405 Method Not Allowed
     */
    public static function methodNotAllowed(string $message = 'Method Not Allowed'): JsonResponse
    {
        return self::error(405, $message);
    }

    /**
     * 409 Conflict - Conflicto con el estado actual del recurso
     */
    public static function conflict(string $message = 'Conflict', mixed $errors = null): JsonResponse
    {
        return self::error(409, $message, $errors);
    }

    /**
     * 410 Gone - El recurso ya no existe
     */
    public static function gone(string $message = 'Resource no longer available'): JsonResponse
    {
        return self::error(410, $message);
    }

    /**
     * 422 Unprocessable Entity - Error de validación
     */
    public static function unprocessable(mixed $errors = null, string $message = 'Validation Error'): JsonResponse
    {
        return self::error(422, $message, $errors);
    }

    /**
     * 429 Too Many Requests - Rate limit excedido
     */
    public static function tooManyRequests(string $message = 'Too Many Requests'): JsonResponse
    {
        return self::error(429, $message);
    }

    // -------------------------------------------------------------------------
    // 5xx - Errores del servidor
    // -------------------------------------------------------------------------

    /**
     * 500 Internal Server Error - Error genérico del servidor
     */
    public static function serverError(string $message = 'Internal Server Error', mixed $errors = null): JsonResponse
    {
        return self::error(500, $message, $errors);
    }

    /**
     * 503 Service Unavailable - Servidor no disponible (mantenimiento, etc.)
     */
    public static function serviceUnavailable(string $message = 'Service Unavailable'): JsonResponse
    {
        return self::error(503, $message);
    }

    // -------------------------------------------------------------------------
    // Métodos genéricos (por si necesitas un código personalizado)
    // -------------------------------------------------------------------------

    /**
     * Respuesta de éxito genérica
     */
    public static function success(int $status, string $message, mixed $data = null): JsonResponse
    {
        return self::response($status, $message, $data);
    }

    /**
     * Respuesta de error genérica
     */
    public static function fail(int $status, string $message, mixed $errors = null): JsonResponse
    {
        return self::error($status, $message, $errors);
    }

    // -------------------------------------------------------------------------
    // Constructores internos
    // -------------------------------------------------------------------------

    private static function response(int $status, string $message, mixed $data = null): JsonResponse
    {
        $body = [
            'status'  => $status,
            'success' => true,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $body['data'] = $data;
        }

        return response()->json($body, $status);
    }

    private static function error(int $status, string $message, mixed $errors = null): JsonResponse
    {
        $body = [
            'status'  => $status,
            'success' => false,
            'message' => $message,
        ];

        if (!is_null($errors)) {
            $body['errors'] = $errors;
        }

        return response()->json($body, $status);
    }
}