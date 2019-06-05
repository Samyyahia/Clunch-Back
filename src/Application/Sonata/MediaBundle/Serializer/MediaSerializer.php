<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 2019-05-26
 * Time: 12:41
 */

namespace Application\Sonata\MediaBundle\Serializer;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use Sonata\MediaBundle\Provider\Pool;
use JMS\Serializer\VisitorInterface;
use Application\Sonata\MediaBundle\Entity\Media;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\XmlSerializationVisitor;
use Symfony\Component\HttpFoundation\RequestStack;

class MediaSerializer implements SubscribingHandlerInterface
{

    /**
     * @param Pool $mediaService
     * @param RequestStack $requestStack
     */
    public function __construct(Pool $mediaService, RequestStack $requestStack) {
        $this->mediaService = $mediaService;
        $this->requestStack  = $requestStack;
    }

    public function serializeMedia(VisitorInterface $visitor, Media $media, array $type, Context $context) {
        $provider = $this->mediaService->getProvider($media->getProviderName());
        $format = $provider->getFormatName($media, 'reference');
        $url = $provider->generatePublicUrl($media, $format);
        $path =  $visitor->visitString($url, $type, $context);

        return $this->requestStack->getCurrentRequest()->getSchemeAndHttpHost().$path;
    }

    public static function getSubscribingMethods() {
        return [
            [
                'type' => Media::class,
                'format' => 'json',
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'method' => 'serializeMedia',
            ],
            [
                'type' => Media::class,
                'format' => 'xml',
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'method' => 'serializeMedia',
            ]
        ];
    }
}
