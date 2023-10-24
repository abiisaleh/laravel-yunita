<!DOCTYPE html>

<html
  class="not-ready lg:text-base"
  style="--bg: #faf8f1"
  lang="en"
>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />

  
  <title>abiisaleh</title>

  
  <meta name="theme-color" />

  
  
  
  
  <meta
    name="description"
    content="A personal blog"
  />
  <meta name="author" content="muhamad abi saleh" />
  

  
  
  
  
  
  
  <link rel="preload stylesheet" as="style" href="https://abiisaleh.xyz/main.min.css" />

  

  
   
  <link rel="preload" as="image" href="https://abiisaleh.xyz/theme.png" />

  
  
  
  <link rel="preload" as="image" href="https://avatars.githubusercontent.com/u/92934849?v=4" />
  
  

  
  <link rel="preload" as="image" href="https://abiisaleh.xyz/github.svg" />
  
  <link rel="preload" as="image" href="https://abiisaleh.xyz/instagram.svg" />
  
  

  
  

  
  <link rel="icon" href="https://abiisaleh.xyz/favicon.ico" />
  <link rel="apple-touch-icon" href="https://abiisaleh.xyz/apple-touch-icon.png" />

  
  <meta name="generator" content="Hugo 0.115.4">

  
  
  <link
    rel="alternate"
    type="application/rss&#43;xml"
    href="https://abiisaleh.xyz/index.xml"
    title="abiisaleh"
  />
  

  
  
  
  
  
  
  
  <meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abiisaleh.xyz/" />


  
  <meta itemprop="name" content="">
<meta itemprop="description" content="">
  
  <meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content=""/>
<meta name="twitter:description" content=""/>

  
  
</head>

  <body class="text-black duration-200 ease-out dark:text-white">
    <header class="mx-auto flex h-[4.5rem] max-w-3xl px-8 lg:justify-center">
  <div class="relative z-50 mr-auto flex items-center">
    <a
      class="-translate-x-[1px] -translate-y-[1px] text-2xl font-semibold"
      href="https://abiisaleh.xyz/"
      >abiisaleh</a
    >
    <div
      class="btn-dark text-[0] ml-4 h-6 w-6 shrink-0 cursor-pointer [background:url(./theme.png)_left_center/_auto_theme('spacing.6')_no-repeat] [transition:_background-position_0.4s_steps(5)] dark:[background-position:right]"
      role="button"
      aria-label="Dark"
    ></div>
  </div>

  <div
    class="btn-menu relative z-50 -mr-8 flex h-[4.5rem] w-[5rem] shrink-0 cursor-pointer flex-col items-center justify-center gap-2.5 lg:hidden"
    role="button"
    aria-label="Menu"
  ></div>

  
  <script>
    
    const htmlClass = document.documentElement.classList;
    setTimeout(() => {
      htmlClass.remove('not-ready');
    }, 10);

    
    const btnMenu = document.querySelector('.btn-menu');
    btnMenu.addEventListener('click', () => {
      htmlClass.toggle('open');
    });

    
    const metaTheme = document.querySelector('meta[name="theme-color"]');
    const lightBg = '#faf8f1'.replace(/"/g, '');
    const setDark = (isDark) => {
      metaTheme.setAttribute('content', isDark ? '#000' : lightBg);
      htmlClass[isDark ? 'add' : 'remove']('dark');
      localStorage.setItem('dark', isDark);
    };

    
    const darkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    if (htmlClass.contains('dark')) {
      setDark(true);
    } else {
      const darkVal = localStorage.getItem('dark');
      setDark(darkVal ? darkVal === 'true' : darkScheme.matches);
    }

    
    darkScheme.addEventListener('change', (event) => {
      setDark(event.matches);
    });

    
    const btnDark = document.querySelector('.btn-dark');
    btnDark.addEventListener('click', () => {
      setDark(localStorage.getItem('dark') !== 'true');
    });
  </script>

  <div
    class="nav-wrapper fixed inset-x-0 top-full z-40 flex h-full select-none flex-col justify-center pb-16 duration-200 dark:bg-black lg:static lg:h-auto lg:flex-row lg:!bg-transparent lg:pb-0 lg:transition-none"
  >
    
    
    <nav class="lg:ml-12 lg:flex lg:flex-row lg:items-center lg:space-x-6">

        <a
        class="block text-center text-2xl leading-[5rem] lg:text-base lg:font-normal"
        href="/blog/"
        >Blog</a
      >
      
      <a
        class="block text-center text-2xl leading-[5rem] lg:text-base lg:font-normal"
        href="/about/"
        >About</a
      >
      
      <a
        class="block text-center text-2xl leading-[5rem] lg:text-base lg:font-normal"
        href="mailto:abi.saleh.25@gmail.com"
        >Contact</a
      >
      
    </nav>
    

    
    <nav
      class="mt-12 flex justify-center space-x-10 dark:invert lg:ml-12 lg:mt-0 lg:items-center lg:space-x-6"
    >
      
      <a
        class="h-8 w-8 text-[0] [background:var(--url)_center_center/cover_no-repeat] lg:h-6 lg:w-6"
        style="--url: url(./github.svg)"
        href="https://github.com/abiisaleh"
        target="_blank"
        rel="me"
      >
        github
      </a>
      
      <a
        class="h-8 w-8 text-[0] [background:var(--url)_center_center/cover_no-repeat] lg:h-6 lg:w-6"
        style="--url: url(./instagram.svg)"
        href="https://instagram.com/abiisaleh"
        target="_blank"
        rel="me"
      >
        instagram
      </a>
      
    </nav>
    
  </div>
</header>
<main class="prose prose-neutral relative mx-auto min-h-[calc(100%-9rem)] max-w-3xl px-8 pb-16 pt-12 dark:prose-invert">
    @yield('content')
</main>

    <footer class="opaco mx-auto flex h-[4.5rem] max-w-3xl items-center px-8 text-[0.9em] opacity-60">
  <div class="mr-auto">
    &copy; 2023
    <a class="link" href="https://abiisaleh.xyz/">abiisaleh</a>
  </div>
  <a class="link mx-6" href="https://gohugo.io/" rel="noopener" target="_blank"
    >Powered by Hugo️️</a
  >️
  <a
    class="link"
    href="https://github.com/nanxiaobei/hugo-paper"
    rel="noopener"
    target="_blank"
    >✎ Paper</a
  >
</footer>

  </body>
</html>
