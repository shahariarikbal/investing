<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Member;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    const CODE_WRONG_ARGS = 'WRONG-ARGS';
    const CODE_NOT_FOUND = 'NOT-FOUND';
    const CODE_INTERNAL_ERROR = 'INTERNAL-ERROR';
    const CODE_UNAUTHORIZED = 'UNAUTHORIZED';
    const CODE_FORBIDDEN = 'FORBIDDEN';
    const CODE_INVALID_MIME_TYPE = 'INVALID-MIME-TYPE';

    protected $resource;

    /**
     * Get the status code
     *
     * @return int $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the status code.
     *
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Repond a no content response.
     *
     * @return response
     */
    public function noContent()
    {
        return response()->json(null, 204);
    }

    /**
     * Respond the item data.
     *
     * @param $item
     * @param $resource
     * @param array $headers
     *
     * @return mixed
     */
    public function respondWithItem($item, $resource, array $headers = [])
    {
        $response = new $resource($item);

        return $response->response()->setStatusCode($this->statusCode)->withHeaders($headers);
    }

    /**
     * Respond the collection data.
     *
     * @param $collection
     * @param $resource
     * @param array $headers
     *
     * @return mixed
     */
    public function respondWithCollection($collection, $resource, array $headers = [])
    {
        $response = $resource::collection($collection);

        return $response->response()->setStatusCode($this->statusCode)->withHeaders($headers);
    }

    /**
     *  Respond the collection data with pagination.
     *
     * @param $paginator
     * @param $resource
     *
     * @return mixed
     */
    public function respondWithPaginator($collection, $resource)
    {
        $per_page = config('view.per_page');
        $per_page = $per_page ? $per_page : 10;
        $collection = $collection->paginate($per_page);

        return $this->respondWithCollection($collection, $resource);
    }

    /**
     * Respond the data.
     *
     * @param array $array
     * @param array $headers
     *
     * @return mixed
     */
    public function respondWithArray(array $array, array $headers = [])
    {
        return response()->json($array, $this->statusCode, $headers);
    }

    /**
     * Respond the message.
     *
     * @param string $message
     *
     * @return json
     */
    public function respondWithMessage($message)
    {
        return $this->setStatusCode(200)
            ->respondWithArray([
                    'message' => $message,
                ]);
    }

    /**
     * Respond the error message.
     *
     * @param string $message
     * @param string $errorCode
     * @param array $errors
     *
     * @return json
     */
    protected function respondWithError($message, $errorCode, $errors = [])
    {
        if ($this->statusCode === 200 && $errorCode !== $this->statusCode) {
            $this->setStatusCode($errorCode);
        }

        if ($this->statusCode === 200) {
            trigger_error(
                'You better have a really good reason for erroring on a 200...',
                E_USER_WARNING
            );
        }

        return $this->respondWithArray([
            'errors' => $errors,
            'message' => $message,
        ]);
    }

    /**
     * Respond the error of 'Forbidden'.
     *
     * @param string $message
     * @param array $errors
     *
     * @return json
     */
    public function errorForbidden($message = 'Forbidden', $errors = [])
    {
        return $this->setStatusCode(403)
                    ->respondWithError($message, self::CODE_FORBIDDEN, $errors);
    }

    /**
     * Respond the error of 'Internal Error'.
     *
     * @param string $message
     * @param array $errors
     *
     * @return json
     */
    public function errorInternalError($message = 'Internal Error', $errors = [])
    {
        return $this->setStatusCode(500)
                    ->respondWithError($message, self::CODE_INTERNAL_ERROR, $errors);
    }

    /**
     * Respond the error of 'Resource Not Found'.
     *
     * @param string $message
     * @param array $errors
     *
     * @return json
     */
    public function errorNotFound($message = 'Resource Not Found', $errors = [])
    {
        return $this->setStatusCode(404)
                    ->respondWithError($message, self::CODE_NOT_FOUND, $errors);
    }

    /**
     * Respond the error of 'Unauthorized'.
     *
     * @param string $message
     * @param array $errors
     *
     * @return json
     */
    public function errorUnauthorized($message = 'Unauthorized', $errors = [])
    {
        return $this->setStatusCode(401)
                    ->respondWithError($message, self::CODE_UNAUTHORIZED, $errors);
    }

    /**
     * Respond the error of 'Wrong Arguments'.
     *
     * @param string $message
     * @param array $errors
     *
     * @return json
     */
    public function errorWrongArgs($message = 'Wrong Arguments', $errors = [])
    {
        return $this->setStatusCode(422)
                    ->respondWithError($message, self::CODE_WRONG_ARGS, $errors);
    }
}
