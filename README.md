<div align="center">

# 🚴‍♂️ Bike Bratislava

### Premium guided **cycling tours** & experiences in Central Europe

<br>

![Bike Bratislava](https://bikebratislava.com/pictures/coffee-break.jpg)

<br>

[![Live Site](https://img.shields.io/badge/Live-bikebratislava.com-111111?style=for-the-badge&logo=googlechrome&logoColor=white)](https://bikebratislava.com/)
&nbsp;
![Version](https://img.shields.io/badge/version-1.0.0-8E8E8E?style=for-the-badge)

<br>

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS_CDN-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
![JavaScript](https://img.shields.io/badge/Vanilla_JS-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP_8-777BB4?style=flat-square&logo=php&logoColor=white)

<br>

🇬🇧 **English** &nbsp;|&nbsp; [🇺🇦 Українською (Scroll down ↓)](#-українською)

</div>

---

## 🌟 About the Project

**Bike Bratislava** is a premium website offering guided cycling tours, road rides, gravel adventures, and custom experiences in and around Bratislava. The goal is to showcase the beauty of Central Europe from the saddle and connect passionate cyclists with local experts.

Everything — from the curated routes and beautiful landscapes to the professional guides — is presented with a fast, engaging, and highly visual experience featuring smooth scrolling, parallax effects, and video backgrounds.

> 🌐 **Live:** [bikebratislava.com](https://bikebratislava.com/) &nbsp;·&nbsp; 📍 **Base:** Bratislava, Slovakia

---

## 📚 Table of Contents

- [Tech Stack](#-tech-stack)
- [Architecture Philosophy](#-architecture-philosophy)
- [Key Features & Nuances](#-key-features--nuances)
- [Page Structure](#-page-structure)
- [Project Layout](#-project-layout)
- [Local Development](#-local-development)
- [Deployment](#-deployment)

---

## 🛠 Tech Stack

| Layer | Technology | Notes |
|-------|-----------|-------|
| **Markup** | HTML5 | Semantic, multi-page structure |
| **Styling** | [Tailwind CSS](https://tailwindcss.com/) CDN + custom CSS | Utility-first styling with custom animations |
| **Logic** | Vanilla JavaScript (ES6+) | Custom interactions + [Lenis](https://lenis.studiofreight.com/) for smooth scrolling |
| **Backend** | PHP 8 (`send.php`) | Secure contact form handling |
| **Fonts** | [Inter](https://fonts.google.com/specimen/Inter) + [Outfit](https://fonts.google.com/specimen/Outfit) | Loaded via Google Fonts with `preconnect` |
| **Icons** | [Lucide Icons](https://lucide.dev/) | Lightweight and consistent iconography |
| **Server** | Apache (`.htaccess`) | HTTPS, GZIP, caching, custom routing |

---

## 🧠 Architecture Philosophy

This project is built to deliver a **luxurious, highly visual, and engaging experience** while keeping the underlying technology straightforward.

- ⚡ **Tailwind via CDN for rapid development.** Allows for quick iterations and styling without a complex build step.
- 🪶 **Vanilla JavaScript.** Interactions like mobile menus, parallax effects, and video playlists are written in plain ES6+ to keep the codebase clean.
- 🌊 **Immersive Scrolling.** Integrated Lenis smooth scroll for a buttery-smooth, premium feel across all pages.
- 🖼️ **Rich Media.** Uses looping local MP4 videos and high-quality imagery with parallax wrappers to create depth without sacrificing performance.

---

## 🚀 Key Features & Nuances

### 1. 🌊 Premium Smooth Scrolling & Parallax
- **Lenis Smooth Scroll:** Provides native-feeling smooth scrolling.
- **Hardware-Accelerated Parallax:** Backgrounds use `translateY` and `scale` with `will-change: transform` to prevent edge bleed and ensure 60fps performance during scrolling.
- **Responsive Handling:** Parallax and video transforms are smartly disabled or reset on mobile devices to prevent layout bugs.

### 2. 🎬 Dynamic Media & Animations
- **Video Playlists:** The hero section features an auto-playing, looping playlist of local MP4 videos, giving the site a dynamic and engaging feel immediately upon load.
- **Scroll Reveal:** Elements smoothly fade in and float up as they enter the viewport using custom CSS animations (`fade-in-up`) and staggered delays.

### 3. 🛡️ Contact Form Handling (Client + Server)
- **PHP Backend:** `send.php` handles form submissions securely.
- **Validation:** Server-side validation for inquiries and booking requests.

### 4. 🔍 Technical SEO & Optimization
- **Meta Tags & Open Graph:** Fully configured titles, descriptions, canonical URLs, and Open Graph/Twitter card tags for optimal sharing.
- **Caching & Compression:** `.htaccess` configured for GZIP and browser caching to ensure fast load times despite rich media.

---

## 🗺 Page Structure

A comprehensive multi-page experience:

| Page | Purpose |
|--------|---------|
| **`index.html`** | Immersive homepage with video hero, featured rides, and trust signals |
| **`about.html`** | The story behind Bike Bratislava and the local cycling culture |
| **`discover.html`** | Showcasing the region, 4 countries, and cycling possibilities |
| **`tours.html`** | Detailed catalog of E-Bike, Road, Gravel, and MTB tours |
| **`guides.html`** | Profiles of the local expert guides |
| **`journal.html`** | Articles, stories, and tips from the saddle |
| **`contact.html`** | Booking inquiries and contact information |
| **`privacy.html`** | Privacy policy |

---

## 📂 Project Layout

```
bikebratislava/
├── index.html          # 🏠 Homepage
├── about.html          # 📖 About the team
├── discover.html       # 🌍 Region overview
├── tours.html          # 🚴 Tour catalog
├── guides.html         # 👨‍🏫 Guide profiles
├── journal.html        # 📝 Blog/Journal
├── contact.html        # ✉️ Contact & booking
├── privacy.html        # 🔒 Privacy policy
├── app.js              # ⚙️ Global JavaScript (Lenis, Menus, etc.)
├── send.php            # 📨 Form handler logic
├── .htaccess           # 🧱 Server config (Caching, GZIP)
├── sitemap.xml         # 🗺 SEO Sitemap
├── robots.txt          # 🤖 Crawler directives
└── pictures/           # 🖼 Images and background videos
```

---

## 💻 Local Development

You can run this project locally using any basic web server. For full form functionality, a PHP server is required.

```bash
# Full preview with working form, via PHP's built-in server:
php -S localhost:8000
# then visit http://localhost:8000
```

> ℹ️ Email delivery relies on PHP's `mail()` and the server's MTA, so the contact form sends real mail only on a properly configured host.

---

## 🚀 Deployment

Pure shared-hosting friendly — just upload the files:

1. Upload the whole directory to your web root (e.g. `public_html/`).
2. Ensure **PHP 8** is enabled and `mail()` is configured.
3. Confirm `mod_rewrite`, `mod_deflate`, and `mod_expires` are active for `.htaccess` to take full effect.

---

<br>

<div align="center">

<h2 id="-українською">🇺🇦 Українською</h2>

[🇬🇧 English (Scroll up ↑)](#-bike-bratislava)

</div>

---

## 🌟 Про Проєкт

**Bike Bratislava** — це преміальний вебсайт, що пропонує велосипедні тури з гідом, шосейні та гравійні заїзди, а також індивідуальні тури у Братиславі та околицях. Мета — показати красу Центральної Європи з сідла велосипеда та об'єднати пристрасних велосипедистів із місцевими експертами.

Усе — від ретельно продуманих маршрутів і мальовничих пейзажів до професійних гідів — представлено через швидкий, захоплюючий і візуально насичений інтерфейс із плавним скролом, паралакс-ефектами та відеофонами.

> 🌐 **Сайт:** [bikebratislava.com](https://bikebratislava.com/) &nbsp;·&nbsp; 📍 **База:** Братислава, Словаччина

---

## 🛠 Технологічний Стек

| Шар | Технологія | Нюанс |
|-----|-----------|-------|
| **Розмітка** | HTML5 | Семантична багатосторінкова структура |
| **Стилі** | [Tailwind CSS](https://tailwindcss.com/) CDN + кастомний CSS | Utility-first підхід з кастомними анімаціями |
| **Логіка** | Vanilla JavaScript (ES6+) | Кастомні взаємодії + [Lenis](https://lenis.studiofreight.com/) для плавного скролу |
| **Бекенд** | PHP 8 (`send.php`) | Безпечна обробка контактної форми |
| **Шрифти** | [Inter](https://fonts.google.com/specimen/Inter) + [Outfit](https://fonts.google.com/specimen/Outfit) | Підключені через Google Fonts з `preconnect` |
| **Іконки** | [Lucide Icons](https://lucide.dev/) | Легкі та узгоджені іконки |
| **Сервер** | Apache (`.htaccess`) | HTTPS, GZIP, кешування, маршрутизація |

---

## 🧠 Філософія Архітектури

Проєкт створено для того, щоб надати **розкішний, візуально привабливий досвід**, зберігаючи при цьому простоту базових технологій.

- ⚡ **Tailwind через CDN для швидкої розробки.** Дозволяє швидко ітерувати та стилізувати без складної збірки.
- 🪶 **Vanilla JavaScript.** Такі взаємодії, як мобільне меню, паралакс-ефекти та плейлисти відео, написані на чистому ES6+ для збереження чистоти коду.
- 🌊 **Занурення завдяки скролу.** Інтегровано Lenis smooth scroll для бездоганно плавного, преміального відчуття на всіх сторінках.
- 🖼️ **Багаті медіа.** Використовуються локальні MP4-відео, що зациклюються, та високоякісні зображення з паралакс-обгортками для створення глибини без втрати продуктивності.

---

## 🚀 Ключові Особливості та Нюанси

### 1. 🌊 Преміальний плавний скрол та паралакс
- **Lenis Smooth Scroll:** Забезпечує природний плавний скрол.
- **Апаратно прискорений паралакс:** Фони використовують `translateY` та `scale` з `will-change: transform`, щоб запобігти обрізанню країв і забезпечити продуктивність 60fps під час прокрутки.
- **Адаптивність:** Паралакс і трансформації відео розумно вимикаються або скидаються на мобільних пристроях, щоб уникнути багів макета.

### 2. 🎬 Динамічні медіа та анімації
- **Відеоплейлисти:** Секція Hero містить плейлист локальних MP4-відео, що автоматично відтворюються та зациклюються, надаючи сайту динамічності з перших секунд.
- **Анімації появи (Scroll Reveal):** Елементи плавно з'являються та піднімаються вгору при потраплянні у видиму зону екрана за допомогою кастомних CSS-анімацій (`fade-in-up`) із затримками.

### 3. 🛡️ Обробка форми (Клієнт + Сервер)
- **PHP Бекенд:** `send.php` безпечно обробляє відправку форм.
- **Валідація:** Серверна перевірка для запитів та бронювань.

### 4. 🔍 Технічне SEO та Оптимізація
- **Метатеги та Open Graph:** Повністю налаштовані заголовки, описи, canonical-URL та теги Open Graph/Twitter для оптимального поширення у соцмережах.
- **Кешування та стиснення:** `.htaccess` налаштовано для GZIP та кешування у браузері, щоб забезпечити швидке завантаження, незважаючи на велику кількість медіафайлів.

---

## 🗺 Структура Сторінки

Повноцінний багатосторінковий сайт:

| Сторінка | Призначення |
|--------|-------------|
| **`index.html`** | Головна сторінка з відео-hero, популярними турами та відгуками |
| **`about.html`** | Історія Bike Bratislava та місцева велокультура |
| **`discover.html`** | Огляд регіону, 4 країн та можливостей для катання |
| **`tours.html`** | Детальний каталог E-Bike, шосейних, гравійних та MTB турів |
| **`guides.html`** | Профілі місцевих гідів-експертів |
| **`journal.html`** | Статті, історії та поради з сідла |
| **`contact.html`** | Контакти та форма бронювання |
| **`privacy.html`** | Політика конфіденційності |

---

## 📂 Структура Проєкту

```
bikebratislava/
├── index.html          # 🏠 Головна сторінка
├── about.html          # 📖 Про команду
├── discover.html       # 🌍 Огляд регіону
├── tours.html          # 🚴 Каталог турів
├── guides.html         # 👨‍🏫 Профілі гідів
├── journal.html        # 📝 Блог / Журнал
├── contact.html        # ✉️ Контакти та бронювання
├── privacy.html        # 🔒 Політика конфіденційності
├── app.js              # ⚙️ Глобальний JavaScript (Lenis, Меню тощо)
├── send.php            # 📨 Обробник форми
├── .htaccess           # 🧱 Налаштування сервера (Кешування, GZIP)
├── sitemap.xml         # 🗺 SEO Sitemap
├── robots.txt          # 🤖 Директиви для пошукових роботів
└── pictures/           # 🖼 Зображення та фонові відео
```

---

## 💻 Локальна Розробка

Ви можете запустити цей проєкт локально за допомогою будь-якого базового вебсервера. Для повноцінної роботи форми потрібен сервер з підтримкою PHP.

```bash
# Повний перегляд із робочою формою через вбудований сервер PHP:
php -S localhost:8000
# далі відкрийте http://localhost:8000
```

> ℹ️ Відправка листів покладається на PHP `mail()` і поштовий сервер (MTA), тож форма надсилає реальні листи лише на правильно налаштованому хостингу.

---

## 🚀 Розгортання

Повністю сумісний зі звичайним shared-хостингом — просто завантажте файли:

1. Завантажте всю директорію у корінь сайту (наприклад, `public_html/`).
2. Переконайтеся, що увімкнено **PHP 8** і налаштовано `mail()`.
3. Перевірте, що активні модулі `mod_rewrite`, `mod_deflate` і `mod_expires` — щоб `.htaccess` працював повністю.

---

<div align="center">

**Made with ⚡ & 🚴 for [Bike Bratislava](https://bikebratislava.com/)**

</div>
