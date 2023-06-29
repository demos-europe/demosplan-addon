<?php

namespace DemosEurope\DemosplanAddon\Contracts\Handler;

interface FaqHandlerInterface
{
    /**
     * Get all enabled faqs of a category regardless of user role restrictions.
     *
     * @return array<int, FaqInterface>
     */
    public function getAllEnabledFaqsRegardlessOfUserRoleRestrictions(FaqCategoryInterface $faqCategory): array;
}