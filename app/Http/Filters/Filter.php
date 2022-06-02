<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter implements FilterInterface
{
    private array $queryParams;

    /**
     * @param array $queryParams
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    /**
     * @return array
     */
    abstract protected function getCallbacks(): array;

    /**
     * @param Builder $builder
     * @return void
     */
    public function apply(Builder $builder)
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     * @return void
     */
    protected function before(Builder $builder)
    {

    }

    /**
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    protected function getQueryParam(string $key, $default = null): mixed
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param string ...$keys
     * @return $this
     */
    protected function removeQueryParam(string ...$keys): static
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
