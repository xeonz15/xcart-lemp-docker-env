<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\Bus\Query\Resolver;

use GraphQL\Deferred;
use GraphQL\Type\Definition\ResolveInfo;
use XCart\Bus\Core\Annotations\Resolver;
use XCart\Bus\Query\Context;
use XCart\Bus\Query\Data\TagsDataSource;
use XCart\SilexAnnotations\Annotations\Service;

/**
 * @Service\Service()
 */
class TagsResolver
{
    /**
     * @var TagsDataSource
     */
    private $tagsDataSource;

    /**
     * @param TagsDataSource $tagsDataSource
     */
    public function __construct(TagsDataSource $tagsDataSource)
    {
        $this->tagsDataSource = $tagsDataSource;
    }

    /** @noinspection MoreThanThreeArgumentsInspection */

    /**
     * @param             $value
     * @param             $args
     * @param Context     $context
     * @param ResolveInfo $info
     *
     * @return Deferred
     *
     * @Resolver()
     */
    public function getList($value, $args, Context $context, ResolveInfo $info): Deferred
    {
        $this->tagsDataSource->loadDeferred();

        return new Deferred(function () use ($context) {
            $tags = array_map(function ($item) use ($context) {
                $item['id']   = $item['name'];
                $item['name'] = $this->getTranslatedName($item, $context->languageCode);

                return $item;
            }, $this->tagsDataSource->getAll());

            uasort($tags, static function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });

            return $tags;
        });
    }

    /**
     * @param array  $item
     * @param string $languageCode
     *
     * @return string
     */
    private function getTranslatedName($item, $languageCode): string
    {
        if (!empty($item['translations'])) {
            foreach ($item['translations'] as $translation) {
                if ($translation['code'] === $languageCode) {
                    return $translation['tag_name'];
                }
            }
        }

        return $item['name'];
    }
}
