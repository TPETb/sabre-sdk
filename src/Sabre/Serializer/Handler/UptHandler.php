<?php
namespace Sabre\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlSerializationVisitor;
use JMS\Serializer\XmlDeserializationVisitor;
use SimpleXmlElement;
use Sabre\DTO\Upt;

class UptHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format'    => 'xml',
                'type'      => 'Sabre\DTO\Upt',
                'method'    => 'serialize',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format'    => 'xml',
                'type'      => 'Sabre\DTO\Upt',
                'method'    => 'deserialize',
            ],
        ];
    }

    public function serialize(
        XmlSerializationVisitor $visitor,
        Upt $value,
        array $type,
        Context $context
    ) {
        $fragment = $visitor->document->createDocumentFragment();
        $fragment->appendXML($value->getContent());
        return $fragment;
    }

    public function deserialize(
        XmlDeserializationVisitor $visitor,
        SimpleXmlElement $value,
        array $type,
        Context $context
    ) {
        // Get element as string and strip open and close tags.
        return new Upt(preg_replace('~<([\w-]+)>(.*)</\1>~us', '\2', $value->asXml()));
    }
}
