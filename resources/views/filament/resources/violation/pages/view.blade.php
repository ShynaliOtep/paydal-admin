<?php
/**
 * @var \App\Models\Violation $record
 */
?>
<x-filament-panels::page>
    <x-filament::section>
        <x-slot name="heading">
            Данные
        </x-slot>
        <p><b>ИИН волонтера:</b> {{$record->volunteer->user->iin}}</p>
        <p><b>ФИО волонтера:</b> {{$record->volunteer->user->fio}}</p>
        <p><b>Контакты волонтера:</b> {{$record->volunteer->user->phone}}</p>
        <p><b>Категория обращения:</b> {{$record->category->title}}</p>
        <p><b>Дата обращения:</b> {{$record->date}}</p>
    </x-filament::section>

    <x-filament::section>
        <x-slot name="heading">
            Местоположение
        </x-slot>
        <div id="map"></div>

        {{--        <iframe--}}
        {{--            src="https://yandex.com/map-widget/v1/?um=constructor%3Aded13833a7bc65e6c633b7cc63819b26bf7921f2c6838ff235fe551659c1d219&amp;source=constructor"--}}
        {{--            width="100%" height="400" frameborder="0"></iframe>--}}

    </x-filament::section>
    <x-filament::section>
        <x-slot name="heading">
            Фото и видео материалы
        </x-slot>
        @foreach($record->medias as $media)
            <img src="https://{{\App\Service\FileService::paydalFileUrl($media->file->path)}}" alt="">
        @endforeach
    </x-filament::section>

    <x-filament::section>
        <x-slot name="heading">
            Комментарий от волонтера
        </x-slot>
        <p>{{$record->comment}}</p>

    </x-filament::section>
    <div class="fi-ac gap-3 flex flex-wrap items-center justify-start">
        <a style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
           class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action"
           @if($record->category_id == 1)
               href="/admin/protocols/create/pdd?violation_id={{$record->id}}&category_id={{$record->category_id}}"
           @else
               href="/admin/protocols/create?violation_id={{$record->id}}&category_id={{$record->category_id}}"
           @endif


        >
            <span class="fi-btn-label">Создать протокол</span>
        </a>
        <a style="--c-400:var(--danger-400);--c-500:var(--danger-500);--c-600:var(--danger-600);"
                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-danger fi-color-danger fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action"
                href="/admin/violations/reject/t?id={{$record->id}}">
            <span class="fi-btn-label">Отклонить</span>
        </a>
    </div>
    <style>
        #map {
            margin: 0;
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
    </style>
    <script src="https://mapgl.2gis.com/api/js/v1"></script>
    <script>
        const map = new mapgl.Map('map', {
            center: [{{$record->location->lon}}, {{$record->location->lat}}],
            zoom: 13,
            key: '355199f0-941c-4ee9-823d-46c4d7798ac8',
            style: 'c080bb6a-8134-4993-93a1-5b4d8c36a59b'
        });
        const marker = new mapgl.Marker(map, {
            coordinates: [{{$record->location->lon}}, {{$record->location->lat}}],
        });
    </script>
    {{--    <script src="https://mapgl.2gis.com/api/js/v1"></script>--}}
    {{--    <script>--}}
    {{--        function initMap() {--}}
    {{--            const map = new mapgl.Map('map', {--}}
    {{--                center: [55.31878, 25.23584],--}}
    {{--                zoom: 13,--}}
    {{--                key: '355199f0-941c-4ee9-823d-46c4d7798ac8',--}}
    {{--            });--}}
    {{--        }--}}
    {{--    </script>--}}
</x-filament-panels::page>
