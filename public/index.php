<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<main>
        <section class="front">
            <div id="front-slider">
                <div class="front__slide" style="background-image:url(./img/slide-1.jpg)">
                    <div class="container">
                        <div class="front__content">
                            <h1 class="mb-24 mb-md-56">Тавла - то что
                                <br>мы едим
                            </h1>
                            <a class="btn btn-primary" href="">Скачать презентацию</a>
                        </div>
                    </div>
                </div>
                <div class="front__slide text-body" style="background-image:url(./img/slide-2.jpg)">
                    <div class="container">
                        <div class="front__content">
                            <h1 class="mb-24 mb-md-56">Тавла - то что
                                <br>мы едим
                            </h1>
                            <a class="btn btn-primary" href="">Скачать презентацию</a>
                        </div>
                    </div>
                </div>
                <div class="front__slide" style="background-image:url(./img/slide-3.jpg)">
                    <div class="container">
                        <div class="front__content">
                            <h1 class="mb-24 mb-md-56">Тавла - то что
                                <br>мы едим
                            </h1>
                            <a class="btn btn-primary" href="">Скачать презентацию</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container position-relative">
                <div class="front__nav" id="front-nav">
                    <button></button>
                    <button></button>
                    <button></button>
                </div>
            </div>
            <a class="front__scroll" href="#about" onclick="scrollAnimateToBlock(event,'#about')">
                Узнать больше <svg width="25" height="57" viewBox="0 0 25 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 12V24C22.5 29.5228 18.0228 34 12.5 34C6.97715 34 2.5 29.5228 2.5 24V12C2.5 6.47715 6.97715 2 12.5 2C18.0228 2 22.5 6.47715 22.5 12ZM0.5 12C0.5 5.37258 5.87258 0 12.5 0C19.1274 0 24.5 5.37258 24.5 12V24C24.5 30.6274 19.1274 36 12.5 36C5.87258 36 0.5 30.6274 0.5 24V12ZM13.5 8.5C13.5 7.94772 13.0523 7.5 12.5 7.5C11.9477 7.5 11.5 7.94772 11.5 8.5V14.5C11.5 15.0523 11.9477 15.5 12.5 15.5C13.0523 15.5 13.5 15.0523 13.5 14.5V8.5ZM11.8195 49.2328L4.81955 42.7328L6.18045 41.2672L12.5 47.1354L18.8195 41.2672L20.1805 42.7328L13.1805 49.2328L12.5 49.8646L11.8195 49.2328ZM4.81955 49.7328L11.8195 56.2328L12.5 56.8646L13.1805 56.2328L20.1805 49.7328L18.8195 48.2672L12.5 54.1354L6.18045 48.2672L4.81955 49.7328Z" fill="white" />
                </svg>
            </a>
        </section>
        <section class="section w-100 overflow-hidden mb-24 mb-lg-92" id="about">
            <div class="container">
                <div class="section__bg-title">
                    <div class="row align-items-center mb-40">
                        <div class="col-lg-6 mb-36">
                            <h2 class="mb-24 mb-xl-40">О бренде</h2>
                            <p class="mb-0">Мы в компании «Агрика» после 13 лет успешной работы на колбасном рынке в качестве дистрибьютора различных марок и производителей решили в дополнение заняться изготовлением собственной мясной и колбасной продукции.</p>
                        </div>
                        <div class="col-lg-6 text-center">
                            <img src="./img/img-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-40 mb-lg-128">
                    <div class="col-lg-6 text-center order-1 order-lg-0">
                        <img src="./img/img-3.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-36">
                        <h2 class="mb-24 mb-xl-40">Наш опыт</h2>
                        <p class="mb-0">Используя свой опыт, мы делаем продукцию под торговой маркой «Тавла». Производство осуществляется ООО «Араповская мясная мануфактура», входящим в группу компаний ООО «Агрика». Производство расположено в городе Ковылкино Республики Мордовия.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 pb-40 d-flex">
                        <div class="privilege">
                            <img class="privilege__ic mb-16" src="./img/p-1.svg" alt="">
                            <div class="privilege__title h4 mb-8">Миссия компании</div>
                            <div class="privilege__text">Улучшение качества жизни</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 pb-40 d-flex">
                        <div class="privilege">
                            <img class="privilege__ic mb-16" src="./img/p-2.svg" alt="">
                            <div class="privilege__title h4 mb-8">Стратегия</div>
                            <div class="privilege__text">Делать продукт с качеством немного выше цены</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 pb-40 d-flex">
                        <div class="privilege">
                            <img class="privilege__ic mb-16" src="./img/p-3.svg" alt="">
                            <div class="privilege__title h4 mb-8">Принципы</div>
                            <div class="privilege__text">Развитие, улучшение, доступность</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 pb-40 d-flex">
                        <div class="privilege">
                            <img class="privilege__ic mb-16" src="./img/p-4.svg" alt="">
                            <div class="privilege__title h4 mb-8">Ценности</div>
                            <div class="privilege__text">Человек, его потребности и безопасность</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section mb-48 mb-md-64 mb-lg-112">
            <div class="container">
                <h2 class="text-center mb-24 mb-md-32">Каталог</h2>
                <div class="carousel">
                    <div class="js-carousel-card">
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-1.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-2.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-1.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-2.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-1.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel__item">
                            <div class="card">
                                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                    <img src="./img/product-2.png" alt="">
                                </a>
                                <div class="card__panel">
                                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                                    <ul class="card__opt">
                                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                                    </ul>
                                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--leedform">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h2 class="mb-8 mb-lg-0">Остались вопросы?</h2>
                    </div>
                    <div class="col-md-6 mb-32 mb-md-0">
                        <form class="section__form" action="" method="">
                            <p class="mb-24 mb-md-48">Оставьте свои контактные данные, и наш менеджер свяжется с вами в ближайшее время</p>
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="tel" type="tel" placeholder="Телефон" required data-inputmask="'mask': '+7(999)999-99-99','clearIncomplete':'true'">
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="cc1" type="checkbox" required>
                                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
                            </div>
                            <button class="btn btn-primary" type="submit" onclick="popupAjax('./popup-thx.html')">Отправить</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="./img/img-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>