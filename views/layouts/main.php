<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pop it MVC</title>
</head>
<body class="">
<header class="bg-black">
   <nav class="flex items-center justify-between text-white max-w-[1200px] mx-auto py-5 uppercase">
       <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
         <?php if (!app()->auth::check()): ?>
           <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
           <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
         <?php else: ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
            
            <?php if (app()->auth::user()->role === 'admin'): ?>
               <!-- Администратор видит ссылки на департаменты, должности, составы -->
               <a href="<?= app()->route->getUrl('/employee') ?>">Сотрудники</a>
            <?php elseif (app()->auth::user()->role === 'employee'): ?>
               <!-- Сотрудник видит только ссылку на сотрудников -->
               <a href="<?= app()->route->getUrl('/department') ?>">Департаменты</a>
               <a href="<?= app()->route->getUrl('/position') ?>">Должности</a>
               <a href="<?= app()->route->getUrl('/compound') ?>">Составы</a>
            <?php endif; ?>
         <?php endif; ?>
       <a href="<?= app()->route->getUrl('/employee-list') ?>">Список сотрудников</a>
       <a href="<?= app()->route->getUrl('/employee-find') ?>">Найти сотрудника</a>
   </nav>
</header>
<main>
   <?= $content ?? '' ?>
</main>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>

