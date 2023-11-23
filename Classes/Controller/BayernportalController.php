<?php declare(strict_types=1);

namespace Passionweb\BayernportalApi\Controller;

use Passionweb\BayernportalApi\Service\BayernportalService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BayernportalController extends ActionController
{
    protected BayernportalService $bayernportalService;

    public function __construct(BayernportalService $bayernportalService) {
        $this->bayernportalService = $bayernportalService;
    }

    public function listAction(): ResponseInterface
    {
        $fetchedData = $this->bayernportalService->fetchJsonData($this->settings);
        $this->view->assign('fetchedData', $fetchedData);
        return $this->htmlResponse();
    }
}
