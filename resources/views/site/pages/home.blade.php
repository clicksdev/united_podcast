@extends('site.layout.main-layout')

@section('title', 'United Podcast')

@section('content')
@php
    $months = array(
        "يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
        "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
    );

    $days = array(
        "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"
    );
@endphp
<div class="ant-layout-header border-0 mb-10 sm:hidden block lg:py-7 pt-8 md:mb-0 mb-10 hidden">
    <ul class="ant-menu-overflow ant-menu ant-menu-root ant-menu-horizontal ant-menu-light justify-center items-center sm:hidden flex li-h-full  ant-menu-rtl css-t2ij9r"
        style="width:100%" dir="rtl" role="menu" tabindex="0" data-menu-list="true">
        <li class="ant-menu-overflow-item ant-menu-overflow-item-rest ant-menu-submenu ant-menu-submenu-horizontal"
            style="opacity:0;height:0;overflow-y:hidden;order:9007199254740991;pointer-events:none;position:absolute"
            aria-hidden="true" role="none">
            <div role="menuitem" class="ant-menu-submenu-title" tabindex="-1" aria-expanded="false"
                aria-haspopup="true" data-menu-id="rc-menu-uuid-70638-2-rc-menu-more"
                aria-controls="rc-menu-uuid-70638-2-rc-menu-more-popup"><span role="img" aria-label="ellipsis"
                    class="anticon anticon-ellipsis"><svg viewBox="64 64 896 896" focusable="false"
                        data-icon="ellipsis" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                        <path
                            d="M176 511a56 56 0 10112 0 56 56 0 10-112 0zm280 0a56 56 0 10112 0 56 56 0 10-112 0zm280 0a56 56 0 10112 0 56 56 0 10-112 0z">
                        </path>
                    </svg></span><i class="ant-menu-submenu-arrow"></i></div>
        </li>
    </ul>
    <div style="display:none" aria-hidden="true"></div>
</div>
<div class="container flex-1 h-full" id="home_wrapper">
    <main class="ant-layout-content css-t2ij9r">
        <div style="padding-bottom:34px;min-height:380px">
            <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl w-full"
                style="column-gap:40px;row-gap:40px">
                @php
                    $latest_articles = App\Models\Article::latest()->take(5)->get();
                @endphp
                @if ($latest_articles->count() > 0)
                    <div class="ant-space-item">
                        <div>
                            <div class="ant-row ant-row-rtl css-t2ij9r"
                            style="margin-left:-8px;margin-right:-8px;row-gap:32px">
                            <div class="swiper mySwiper main-slider" style="padding-bottom: 2rem">
                                <div class="swiper-wrapper">
                                    @foreach ($latest_articles as $index => $article)
                                    <div class="swiper-slide" style="padding: 0 3rem;">
                                        <div style="padding-left:8px;padding-right:8px"
                                            class="ant-col ant-col-24 ant-col-rtl css-t2ij9r">
                                            <article class="relative">
                                                <div class="ant-row ant-row-middle ant-row-rtl css-t2ij9r"
                                                    style="margin-left:-8px;margin-right:-8px;row-gap:16px">
                                                    <div style="padding-left:8px;padding-right:8px"
                                                        class="ant-col ant-col-xs-24 ant-col-rtl ant-col-md-12 ant-col-xl-12 css-t2ij9r">
                                                        <a href='{{ route("post.show", ["id" => $article->id]) }}'><img
                                                                alt="{{ $article->title }}" loading="eager"
                                                                decoding="async" data-nimg="1"
                                                                class="rounded-lg max-w-full h-auto aspect-[572.5/291]"
                                                                style="color:transparent;object-fit:cover"
                                                                src="{{ $article->thumbnail_path }}"
                                                                width="600" height="300"></a></div>
                                                    <div style="padding-left:8px;padding-right:8px"
                                                        class="ant-col ant-col-xs-24 ant-col-rtl ant-col-md-12 ant-col-xl-12 css-t2ij9r">
                                                        <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl">
                                                            <div class="ant-space-item"><a
                                                                    href="{{ route("post.show", ["id" => $article->id]) }}">
                                                                    <h4 class="ant-typography ant-typography-rtl ant-typography-ellipsis ant-typography-ellipsis-multiple-line  !text-[24px] mb-3 leading-[35px] css-t2ij9r"
                                                                        >{{ $article->title }}</h4>
                                                                    <div
                                                                        class="ant-typography ant-typography-rtl  text-lg line-clamp-3 mb-3 css-t2ij9r">
                                                                            {{ $article->intro }}
                                                                        </div>
                                                                </a></div>
                                                            <div class="ant-space-item">
                                                                <div class="mb-3">
                                                                    <div class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center w-full"
                                                                        style="column-gap:16px;row-gap:16px">
                                                                        <div class="ant-space-item last-of-type:flex-1 "><a
                                                                                class="font-bold"
                                                                                href="/author/{{$article->author->id}}"><span
                                                                                    class="flex items-center gap-2 font-bold undefined">
                                                                                        @if ($article->author->profile_path)
                                                                                        <img alt="" loading="lazy" decoding="async" data-nimg="1" class="rounded-full" style="color: transparent;" src="{{ $article->author->profile_path }}" width="18" height="18">
                                                                                        @endif
                                                                                        {{ $article->author->name }}
                                                                                    </span></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-sm mb-2"><span>في <!-- --> <a
                                                                    class="text-black font-bold" href="/channel/{{ $article->channel->id }}">{{ $article->channel->title }}</a><span
                                                                class="ant-typography ant-typography-rtl text-colorTextSecondary sm:text-sm text-xs css-t2ij9r"
                                                                title="16 ديسمبر 2023"><i
                                                                    class="inline-block h-1 w-1 rounded-full bg-[#B2B2B2] mx-1 align-middle"></i>
                                                                    {{$days[Carbon\Carbon::parse($article->created_at)->dayOfWeek] . ', ' . Carbon\Carbon::parse($article->created_at)->day . ' ' . $months[Carbon\Carbon::parse($article->created_at)->month - 1] . ', ' . Carbon\Carbon::parse($article->created_at)->year}}
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination" style="bottom: 0;"></div>
                                <div class="swiper-button-next" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                                <div class="swiper-button-prev" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="ant-space-item">
                    <div class="ant-divider css-t2ij9r ant-divider-horizontal ant-divider-rtl  m-0"
                        role="separator"></div>
                </div>

                <div class="ant-space-item" v-if="latest_articles && latest_articles.length > 0" style="display: none" :style='latest_articles && latest_articles.length > 0 ? "display: block" : "display: none"'><!--$-->
                    <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl w-full" style="column-gap:40px;row-gap:40px">
                        <div class="ant-space-item">
                            <div
                                class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full justify-between -mb-2 ">
                                <div class="ant-space-item">
                                    <div
                                        class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full">
                                        <div class="ant-space-item"><svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.95732 2.68696C5.10032 2.68696 4.40132 3.39296 4.40132 4.25996C4.40132 5.12796 5.10032 5.83296 5.95732 5.83296C6.81532 5.83296 7.51532 5.12796 7.51532 4.25996C7.51532 3.39296 6.81532 2.68696 5.95732 2.68696ZM5.95732 8.45696C3.65232 8.45696 1.77832 6.57497 1.77832 4.25996C1.77832 1.94597 3.65232 0.0639648 5.95732 0.0639648C8.26332 0.0639648 10.1383 1.94597 10.1383 4.25996C10.1383 6.57497 8.26332 8.45696 5.95732 8.45696Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M3.27046 23.3137H8.64646V14.3427C8.64646 12.8617 7.44046 11.6557 5.95846 11.6557C4.47646 11.6557 3.27046 12.8617 3.27046 14.3427V23.3137ZM11.2695 25.9367H0.647461V14.3427C0.647461 11.4147 3.03046 9.03271 5.95846 9.03271C8.88746 9.03271 11.2695 11.4147 11.2695 14.3427V25.9367Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M19.677 2.68696C18.82 2.68696 18.121 3.39296 18.121 4.25996C18.121 5.12796 18.82 5.83296 19.677 5.83296C20.535 5.83296 21.235 5.12796 21.235 4.25996C21.235 3.39296 20.535 2.68696 19.677 2.68696ZM19.677 8.45696C17.372 8.45696 15.498 6.57497 15.498 4.25996C15.498 1.94597 17.372 0.0639648 19.677 0.0639648C21.983 0.0639648 23.858 1.94597 23.858 4.25996C23.858 6.57497 21.983 8.45696 19.677 8.45696Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M16.5128 23.3137H23.5958L20.6978 12.2967C20.6368 11.9247 20.3178 11.6557 19.9418 11.6557C19.5618 11.6557 19.2358 11.9387 19.1818 12.3127L19.1578 12.4337L16.5128 23.3137ZM26.9998 25.9367H13.1748L16.5958 11.8687C16.8658 10.2467 18.2908 9.03271 19.9418 9.03271C21.5848 9.03271 22.9758 10.1937 23.2748 11.8007L26.9998 25.9367Z"
                                                    fill="black"></path>
                                            </svg></div>
                                        <div class="ant-space-item">
                                            <h3 class="ant-typography ant-typography-rtl !mb-0 css-t2ij9r">
                                                المقالات الجديدة</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ant-space-item">
                            <div>
                                <div class="ant-row ant-row-rtl css-t2ij9r swiper-wrapper-latest" style="margin-left: -8px; margin-right: -8px; row-gap: 32px;padding: 0 3.2rem;position: relative;">
                                    <div class="swiper latestSwiper" style="width: 100%;position: static;">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide" v-for="article in latest_articles" :key="article.id">                                            
                                              <div style="padding-left:8px;padding-right:8px;  min-width: 100%;" class="ant-col ant-col-xs-24 ant-col-rtl ant-col-sm-24 ant-col-md-24 ant-col-lg-12 css-t2ij9r">
                                                  <article class="relative">
                                                      <div class="ant-row ant-row-top ant-row-rtl css-t2ij9r" style="margin-left: -8px; margin-right: -8px; row-gap: 16px;flex-direction: column;justify-content: center;align-items: center;">
                                                          <div style="padding-left:8px;padding-right:8px;min-width: 100%"
                                                              class="ant-col ant-col-xs-8 ant-col-rtl ant-col-md-7 ant-col-xl-8 css-t2ij9r">
                                                              <a :href="`/post/${article.id}`"><img :alt="article.title"
                                                                      loading="lazy" decoding="async" data-nimg="1"
                                                                      class="rounded-lg max-w-full h-auto aspect-[180/150]"
                                                                      style="color:transparent;object-fit:cover"
                                                                      :src="article.thumbnail_path"
                                                                      width="600" height="300"></a>
                                                          </div>
                                                          <div style="padding-left:8px;padding-right:8px;min-width: 100%"
                                                              class="ant-col ant-col-xs-16 ant-col-rtl ant-col-md-17 ant-col-xl-16 css-t2ij9r">
                                                              <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl">
                                                                  <div class="ant-space-item"><a :href="`/post/${article.id}`">
                                                                          <h4 class="ant-typography ant-typography-rtl ant-typography-ellipsis ant-typography-ellipsis-multiple-line  !text-[18px] mb-2 leading-[30px] css-t2ij9r"
                                                                              >@{{ article.title }}</h4>
                                                                          <div
                                                                              class="ant-typography ant-typography-rtl  text-sm line-clamp-1 lg:line-clamp-2 mb-2 css-t2ij9r">
                                                                              @{{ article.intro }}
                                                                          </div>
                                                                      </a></div>
                                                                  <div class="ant-space-item">
                                                                      <div class=" mb-2">
                                                                          <div class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center w-full"
                                                                              style="column-gap:16px;row-gap:16px">
                                                                              <div class="ant-space-item last-of-type:flex-1 ">
                                                                                  <a class="font-bold text-sm" :href="`/author/${article.author.id}`"><span
                                                                                          class="flex items-center gap-2 font-bold undefined">@{{ article.author.name }}</span></a>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="text-sm mb-2"><span>في <!-- --> <a class="text-black font-bold"
                                                                          :href="`/channel/${article.channel.id}`">@{{ article.channel.title }}</a></span><span
                                                                      class="ant-typography ant-typography-rtl text-colorTextSecondary sm:text-sm text-xs css-t2ij9r"
                                                                      title="13 ديسمبر 2023"><i
                                                                          class="inline-block h-1 w-1 rounded-full bg-[#B2B2B2] mx-1 align-middle"></i>
                                                                          @{{new Date(article.created_at).getDate() + ' ' + ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                                                                          "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                                                                        ][new Date(article.created_at).getMonth()] + ', ' + new Date(article.created_at).getFullYear()}}
                                                                    </span>
                                                                </div>
                                                          </div>
                                                      </div>
                                                  </article>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="swiper-pagination" style="bottom: 0;"></div>
                                        <div class="swiper-button-next" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                                        <div class="swiper-button-prev" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ant-space-item">
                            <div class="ant-divider css-t2ij9r ant-divider-horizontal ant-divider-rtl  m-0" role="separator"></div>
                        </div>
                    </div><!--/$-->
                </div>

                @php
                    $latest_podcast = App\Models\Article::where('type', 'podcast')->latest()->take(2)->get();
                    $latest_programs = App\Models\Channel::where('type', 'podcast')->latest()->take(6)->get();
                @endphp
                @if ($latest_podcast->count() > 0 && $latest_programs->count() > 0)
                    <div class="ant-space-item">
                        <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl w-full"
                            style="gap: 40px;">
                            <div class="ant-space-item">
                                <div
                                    class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full justify-between -mb-2 ">
                                    <div class="ant-space-item">
                                        <div
                                            class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full">
                                            <div class="ant-space-item"><svg width="23" height="30"
                                                    viewBox="0 0 23 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.931 14.8096V18.0246C19.931 22.6506 16.167 26.4146 11.541 26.4146C6.91403 26.4146 3.15103 22.6506 3.15103 18.0246V14.9026H0.0820312V18.0246C0.0820312 24.3436 5.22203 29.4836 11.541 29.4836C17.86 29.4836 23 24.3436 23 18.0246V14.8096H19.931Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M11.614 21.3696C9.33704 21.3696 7.48304 19.0776 7.48304 16.2606H4.41504C4.41504 20.7686 7.64404 24.4366 11.614 24.4366C15.586 24.4366 18.815 20.7686 18.815 16.2606V8.6956C18.815 4.1846 15.586 0.516602 11.614 0.516602C7.64404 0.516602 4.41504 4.1846 4.41504 8.7026L4.44404 15.0846L10.08 15.0956L10.086 12.0256L7.49804 12.0206L7.48304 8.6956C7.48304 5.8786 9.33704 3.5866 11.614 3.5866C13.893 3.5866 15.747 5.8786 15.747 8.6956V16.2606C15.747 19.0776 13.893 21.3696 11.614 21.3696Z"
                                                        fill="black"></path>
                                                </svg></div>
                                            <div class="ant-space-item">
                                                <h3 class="ant-typography ant-typography-rtl !mb-0 css-t2ij9r">
                                                    الحلقات الجديدة</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-space-item">
                                <div>
                                    <div class="ant-row ant-row-rtl css-t2ij9r swiper-wrapper-latest" style="margin-left: -8px; margin-right: -8px; row-gap: 32px;padding: 0 3.2rem;position: relative;">
                                        <div class="swiper latestSwiper" style="width: 100%;position: static;">
                                            <div class="swiper-wrapper">
                                              <div class="swiper-slide" v-for="article in latest_podcasts" :key="article.id">                                            
                                                  <div style="padding-left:8px;padding-right:8px;  min-width: 100%;" class="ant-col ant-col-xs-24 ant-col-rtl ant-col-sm-24 ant-col-md-24 ant-col-lg-12 css-t2ij9r">
                                                      <article class="relative">
                                                          <div class="ant-row ant-row-top ant-row-rtl css-t2ij9r" style="margin-left: -8px; margin-right: -8px; row-gap: 16px;flex-direction: column;justify-content: center;align-items: center;">
                                                              <div style="padding-left:8px;padding-right:8px;min-width: 100%"
                                                                  class="ant-col ant-col-xs-8 ant-col-rtl ant-col-md-7 ant-col-xl-8 css-t2ij9r">
                                                                  <a :href="`/post/${article.id}`"><img :alt="article.title"
                                                                          loading="lazy" decoding="async" data-nimg="1"
                                                                          class="rounded-lg max-w-full h-auto aspect-[180/150]"
                                                                          style="color:transparent;object-fit:cover"
                                                                          :src="article.thumbnail_path"
                                                                          width="600" height="300"></a>
                                                              </div>
                                                              <div style="padding-left:8px;padding-right:8px;min-width: 100%"
                                                                  class="ant-col ant-col-xs-16 ant-col-rtl ant-col-md-17 ant-col-xl-16 css-t2ij9r">
                                                                  <div class="ant-space css-t2ij9r ant-space-vertical ant-space-rtl">
                                                                      <div class="ant-space-item"><a :href="`/post/${article.id}`">
                                                                              <h4 class="ant-typography ant-typography-rtl ant-typography-ellipsis ant-typography-ellipsis-multiple-line  !text-[18px] mb-2 leading-[30px] css-t2ij9r"
                                                                                  >@{{ article.title }}</h4>
                                                                              {{-- <div
                                                                                  class="ant-typography ant-typography-rtl  text-sm line-clamp-1 lg:line-clamp-2 mb-2 css-t2ij9r">
                                                                                  @{{ article.intro }}
                                                                              </div> --}}
                                                                          </a></div>
                                                                      <div class="ant-space-item">
                                                                          <div class=" mb-2">
                                                                              <div class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center w-full"
                                                                                  style="column-gap:16px;row-gap:16px">
                                                                                  <div class="ant-space-item last-of-type:flex-1 ">
                                                                                      <a class="font-bold text-sm" :href="`/author/${article.author.id}`"><span
                                                                                              class="flex items-center gap-2 font-bold undefined">@{{ article.author.name }}</span></a>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="text-sm mb-2"><span>في <!-- --> <a class="text-black font-bold"
                                                                              :href="`/channel/${article.channel.id}`">@{{ article.channel.title }}</a></span><span
                                                                          class="ant-typography ant-typography-rtl text-colorTextSecondary sm:text-sm text-xs css-t2ij9r"
                                                                          title="13 ديسمبر 2023"><i
                                                                              class="inline-block h-1 w-1 rounded-full bg-[#B2B2B2] mx-1 align-middle"></i>
                                                                              @{{new Date(article.created_at).getDate() + ' ' + ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                                                                              "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                                                                            ][new Date(article.created_at).getMonth()] + ', ' + new Date(article.created_at).getFullYear()}}
                                                                        </span>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                      </article>
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="swiper-pagination" style="bottom: 0;"></div>
                                            <div class="swiper-button-next" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                                            <div class="swiper-button-prev" style="width: 40px;height: 40px;padding: 10px;background: #030388;color: white;display: flex;justify-content: center;align-items: center;border-radius: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="ant-space-item">
                                <div class="ant-divider css-t2ij9r ant-divider-horizontal ant-divider-rtl  m-0" role="separator"></div>
                            </div>
    
                            <div class="ant-space-item"  id="our_programs">
                                <div
                                    class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full justify-between -mb-2 ">
                                    <div class="ant-space-item">
                                        <div
                                            class="ant-space css-t2ij9r ant-space-horizontal ant-space-rtl ant-space-align-center ant-space-gap-row-small ant-space-gap-col-small w-full">
                                            <div class="ant-space-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-podcasts" width="33" height="33" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 3v2" />
                                                <path d="M12 19v2" />
                                                <path d="M12 8v8" />
                                                <path d="M8 17v2" />
                                                <path d="M4 11v2" />
                                                <path d="M20 11v2" />
                                                <path d="M8 5v8" />
                                                <path d="M16 7v-2" />
                                                <path d="M16 19v-8" />
                                              </svg></div>
                                            <div class="ant-space-item">
                                                <h3 class="ant-typography ant-typography-rtl !mb-0 css-t2ij9r">
                                                     البرامج</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-space-item" v-if="channels && channels.length">
                                <div class="channels_wrapper" style="display: grid;grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));gap: 16px">
                                    <a :href="`/channel/${channel.id}`" v-for="channel in channels" :key="channel.id" style="width: 100%;font-size: 18px;font-weight: 600;color: #000;text-align: center;  line-height: 24px;">
                                        <div class="img" style="width: 100%;height: auto;border-radius: 10px; overflow:hidden;margin-bottom: 10px;">
                                            <img :src="channel.thumbnail_path" alt=""  style="width: 100%;height: 100%;object-fit: cover;">
                                        </div>
                                        @{{channel.title}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <script
                type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://thmanyah.com/#organization","name":"United Podcast","url":"https://thmanyah.com/","sameAs":["https://www.facebook.com/Thmanyah","https://www.instagram.com/thmanyah/","https://www.linkedin.com/company/thmanyah","https://www.youtube.com/channel/UCQPalfEYxVLs8nEB4LutApQ","https://twitter.com/thmanyah"]},{"@type":"WebSite","@id":"https://thmanyah.com/#website","url":"https://thmanyah.com/","name":"United Podcast","description":"نصنع الوثائقيات وننشر المقالات ونصدح عبر البودكاست، لنغيّر ثقافة الصحافة العربية.","publisher":{"@id":"https://thmanyah.com/#organization"},"potentialAction":[{"@type":"SearchAction","target":"https://thmanyah.com/search/?q={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"ar"}]}</script>
        </div>
    </main>
</div>
@endsection

@section('scripts')
<script>
const { createApp, ref } = Vue

createApp({
    data() {
        return {
            latest_articles: null,
            latest_podcasts: null,
            channels: [],
            num: 10,
        }
    },
    methods: {
        async getArticles(num) {
            try {
                const response = await axios.post(`{{ route('articles.latest') }}`, {
                    num: num,
                    type: "article",
                },
                );
                if (response.data.status === true) {
                    this.latest_articles = response.data.data.articles
                    this.latest_podcasts = response.data.data.poscasts
                    this.channels = response.data.data.programs
                    this.isMore = response.data.data.isMore
                } else {
                    document.getElementById('errors').innerHTML = ''
                    $.each(response.data.errors, function (key, value) {
                        let error = document.createElement('div')
                        error.classList = 'error'
                        error.innerHTML = value
                        document.getElementById('errors').append(error)
                    });
                    $('#errors').fadeIn('slow')
                    setTimeout(() => {
                        $('input').css('outline', 'none')
                        $('#errors').fadeOut('slow')
                    }, 5000);
                }

            } catch (error) {
                document.getElementById('errors').innerHTML = ''
                let err = document.createElement('div')
                err.classList = 'error'
                err.innerHTML = 'server error try again later'
                document.getElementById('errors').append(err)
                $('#errors').fadeIn('slow')
                $('.loader').fadeOut()
                this.languages_data = false
                setTimeout(() => {
                    $('#errors').fadeOut('slow')
                }, 3500);

                console.error(error);
            }
        },
        handleScroll() {
        // Check if the user has scrolled to the bottom of the page
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                if (this.isMore) {
                    $("#load-more-button .dots").fadeIn().css('diplay', 'flex')
                    this.getArticles(this.num + 2).then(() => {
                        $("#load-more-button").fadeOut()
                    })
                }
            }
        },
    },
    created() {
        this.getArticles().then(() => {
            $('.loader').fadeOut()
            setLatestSwipper()
        })
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        // Remove the scroll event listener when the component is destroyed to prevent memory leaks
        window.removeEventListener('scroll', this.handleScroll);
    },
}).mount('#home_wrapper')
</script>
@endsection
