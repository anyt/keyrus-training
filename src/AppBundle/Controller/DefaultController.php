<?php

namespace AppBundle\Controller;

use AppBundle\Event\RoundingEvent;
use Oro\Bundle\ProductBundle\Rounding\QuantityRoundingService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     "/round/{precision}",
     *     requirements={"precision"="\d+"})
     * @return Response
     * @throws \Oro\Bundle\CurrencyBundle\Exception\InvalidRoundingTypeException
     */
    public function roundAction($precision)
    {
        /** @var QuantityRoundingService $roundingService */
        $roundingService = $this->get('oro_product.service.quantity_rounding');
        $roundedValue = $roundingService->round(88888.88888, $precision, QuantityRoundingService::ROUND_DOWN);

        $roundingEvent = new RoundingEvent($roundedValue);

        /** @var EventDispatcherInterface $dispatcher */
        $dispatcher = $this->get('event_dispatcher');
        $dispatcher->dispatch(RoundingEvent::NAME, $roundingEvent);

        return new Response($roundingEvent->getNumber());
    }
}
