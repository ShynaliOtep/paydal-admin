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
        <x-filament::section>
            <x-slot name="heading">
               Данные волонтера
            </x-slot>
            <p><b>ИИН:</b> {{$record->user->iin}}</p>
            <p><b>ФИО:</b> {{$record->fio}}</p>
            <p><b>Номер телефона:</b> {{$record->user->phone}}</p>
            <p><b>Город:</b> {{$record->city->title}}</p>
        </x-filament::section>
        <x-filament::section>
            <x-slot name="heading">
                Лицевая сторона документа
            </x-slot>
            <img class="document-img" src="http://{{\App\Service\FileService::paydalFileUrl($record->document->frontImage->path)}}" alt="A">
        </x-filament::section>
        <x-filament::section>
            <x-slot name="heading">
                Задняя сторона документа
            </x-slot>
            <img class="document-img" src="http://{{\App\Service\FileService::paydalFileUrl($record->document->backImage->path)}}" alt="A">
        </x-filament::section>
        <x-filament::section>
            <x-slot name="heading">
                Фото с Лицевой стороной
            </x-slot>
            <img class="document-img" src="http://{{\App\Service\FileService::paydalFileUrl($record->document->frontWithAvatar->path)}}" alt="A">
        </x-filament::section>
        <x-filament::section>
            <x-slot name="heading">
                Фото с задней стороной
            </x-slot>
            <img class="document-img" src="http://{{\App\Service\FileService::paydalFileUrl($record->document->backWithAvatar->path)}}" alt="A">
        </x-filament::section>
    @if (count($relationManagers = $this->getRelationManagers()))
        <x-filament-panels::resources.relation-managers
            :active-manager="$this->activeRelationManager"
            :managers="$relationManagers"
            :owner-record="$record"
            :page-class="static::class"
        />
    @endif
        <x-filament-panels::form.actions
            :actions="$this->getActions()"
        />
        <style>
            .document-img{
                max-width: 400px;
            }
        </style>
</x-filament-panels::page>
