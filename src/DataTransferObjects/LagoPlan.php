<?php

namespace Zehntinel\LaravelLago\DataTransferObjects;

class LagoPlan
{
    public function __construct(
        private readonly string $lago_id,
        private readonly string $name,
        private readonly string $code,
        private readonly string $interval,
        private readonly int $amount_cents,
        private readonly string $amount_currency,
        private readonly string $created_at
    ) {
    }
}
