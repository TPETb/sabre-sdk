<?php
namespace Sabre\Serializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Handler\HandlerRegistry;
use Sabre\Serializer\Handler\UptHandler;
use Sabre\Serializer\Handler\LangHandler;

trait SerializerTrait
{
    protected $serializer;

    // protected : main action //

    /**
     * @param $dto
     * @return string
     * @todo find a better way to avoid <?xml... in serialized string
     */
    protected function serialize($dto)
    {
        return str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $this->getSerializer()->serialize($dto, $this->getSerializeFormat()));
    }

    protected function deserialize($xml, $className)
    {
        return $this->getSerializer()->deserialize(
            $xml,
            $className,
            $this->getSerializeFormat()
        );
    }

    // protected : services and parameters //

    protected function getSerializer()
    {
        if (! $this->serializer) {
            /**
             * This leads to Doctrine attempting to resolve file via stream_resolve_include_path which fails
             */
//            AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation');

            $this->serializer = SerializerBuilder::create()
                ->addDefaultHandlers()
                ->configureHandlers(
                    function (HandlerRegistry $registry) {
                        $registry->registerSubscribingHandler(new UptHandler());
                        $registry->registerSubscribingHandler(new LangHandler());
                    }
                )
                ->build()
            ;
        }
        return $this->serializer;
    }

    protected function getSerializeFormat()
    {
        return 'xml';
    }
}
