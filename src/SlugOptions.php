<?php

namespace Spatie\Sluggable;

class SlugOptions
{
    /** @var array|callable */
    public $generateSlugFrom;

    /** @var string */
    public $slugField;

    /** @var bool */
    public $generateUniqueSlugs = true;

    /** @var int */
    public $maximumLength = 250;

    /** @var bool */
    public $generateSlugsOnCreate = true;

    /** @var bool */
    public $generateSlugsOnUpdate = true;

    /** @var string */
    public $slugSeparator = '-';

    /** @var string */
    public $slugLanguage = 'en';

    public static function create(): SlugOptions
    {
        return new static();
    }

    /**
     * @param string|array|callable $fieldName
     *
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function generateSlugsFrom($fieldName): SlugOptions
    {
        if (is_string($fieldName)) {
            $fieldName = [$fieldName];
        }

        $this->generateSlugFrom = $fieldName;

        return $this;
    }

    public function saveSlugsTo(string $fieldName): SlugOptions
    {
        $this->slugField = $fieldName;

        return $this;
    }

    public function allowDuplicateSlugs(): SlugOptions
    {
        $this->generateUniqueSlugs = false;

        return $this;
    }

    public function slugsShouldBeNoLongerThan(int $maximumLength): SlugOptions
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }

    public function doNotGenerateSlugsOnCreate(): SlugOptions
    {
        $this->generateSlugsOnCreate = false;

        return $this;
    }

    public function doNotGenerateSlugsOnUpdate(): SlugOptions
    {
        $this->generateSlugsOnUpdate = false;

        return $this;
    }

    public function usingSeparator(string $separator): SlugOptions
    {
        $this->slugSeparator = $separator;

        return $this;
    }

    public function usingLanguage(string $language): SlugOptions
    {
        $this->slugLanguage = $language;

        return $this;
    }
}
