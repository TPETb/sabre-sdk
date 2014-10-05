<?php
namespace Sabre\Serializer\Handler;

use DomAttr;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlSerializationVisitor;
use JMS\Serializer\XmlDeserializationVisitor;
use SimpleXmlElement;
use Sabre\DTO\LangElement;

class LangHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format'    => 'xml',
                'type'      => 'Sabre\DTO\LangElement',
                'method'    => 'serialize',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format'    => 'xml',
                'type'      => 'Sabre\DTO\LangElement',
                'method'    => 'deserialize',
            ],
        ];
    }

    public function serialize(
        XmlSerializationVisitor $visitor,
        LangElement $value,
        array $type,
        Context $context
    ) {
        $visitor->getCurrentNode()->setAttributeNode(new DomAttr('xml:lang', $value->getLang()));
        return $visitor->document->createTextNode($value->getValue());
    }

    public function deserialize(
        XmlDeserializationVisitor $visitor,
        SimpleXmlElement $value,
        array $type,
        Context $context
    ) {
        return LangElement::factory((string) $value->xpath('@xml:lang')[0], (string) $value);
    }
}
