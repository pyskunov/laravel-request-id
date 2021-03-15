<?php

namespace Illuminate\Http
{
    class Request
    {
        /**
         * @see LaravelRequestIdServiceProvider@boot > Request::macro('uuid', ...)
         *
         * @return string
         */
        public function uuid(): string
        {
            return 'uuid';
        }
    }
}
