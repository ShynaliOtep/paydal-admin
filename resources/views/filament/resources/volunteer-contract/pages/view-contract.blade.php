<?php
/**
 * @var \App\Models\VolunteerContract $record
 */
?>
<x-filament-panels::page>
    @if ($this->hasInfolist())
        {{ $this->infolist }}
    @else
        {{ $this->form }}
    @endif

    <?php dump( $this->record->document) ?>
        <x-filament::avatar
            src="{{\App\Service\FileService::paydalFileUrl($record->document->frontImage->path)}}"
            alt="Dan Harrin"
            size="w-12 h-12"
        />

    @if (count($relationManagers = $this->getRelationManagers()))
        <x-filament-panels::resources.relation-managers
            :active-manager="$this->activeRelationManager"
            :managers="$relationManagers"
            :owner-record="$record"
            :page-class="static::class"
        />
    @endif
</x-filament-panels::page>
