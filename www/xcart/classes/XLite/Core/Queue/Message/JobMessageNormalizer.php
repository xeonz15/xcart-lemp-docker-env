<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Core\Queue\Message;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use XLite\Core\Job\Job;

/**
 */
class JobMessageNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /** @var JobMessage $object */
        return [
            'name'  => $object->getName(),
            'job'   => $this->normalizeJob($object->getJob())
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return new JobMessage(
            unserialize($data['job']),
            $data['name']
        );
    }

    /**
     * @param Job $job
     *
     * @return string
     * TODO Job itself should be normalizable
     */
    protected function normalizeJob(Job $job)
    {
        return serialize($job);
    }

    /**
     * @param $job
     *
     * @return mixed
     * TODO Job itself should be normalizable
     */
    protected function denormalizeJob($job)
    {
        return unserialize($job);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'XLite\Core\Queue\Message\JobMessage';
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof JobMessage;
    }
}
