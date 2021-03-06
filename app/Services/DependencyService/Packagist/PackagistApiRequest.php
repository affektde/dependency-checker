<?php

namespace App\Services\DependencyService\Packagist;

use App\Services\DependencyService\DependencyRequest;
use Sametsahindogan\GuzzleWrapper\Builder\ApiCallBuilder;

/**
 * Class PackagistApiRequest
 * @package App\Services\DependencyService\Packagist
 */
class PackagistApiRequest implements DependencyRequest
{
    /** @var string $apiUrl */
    protected $apiUrl;

    /**
     * PackagistApiRequest constructor.
     */
    public function __construct()
    {
        $this->apiUrl = config('services.packagist.api_url');
    }

    /**
     * @param string $repo
     * @return PackagistApiResponse
     */
    public function getPackage(string $repo)
    {
        return (new PackagistApiResponse(
            (new ApiCallBuilder($this->apiUrl,'/'.$repo, ApiCallBuilder::HTTP_GET))
                ->call()
        ));
    }
}
