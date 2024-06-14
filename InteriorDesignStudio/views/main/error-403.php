<?php

use core\Core;

Core::getInstance()->pageParams['title'] = 'Помилка 403';
?>

<style>
        .error-container {
            margin: 100px auto;
            text-align: center;
            max-width: 600px;
        }

        .error-heading {
            font-size: 2.5rem;
            font-weight: bold;
            color: #dc3545;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 1.5rem;
            color: #dc3545;
        }
    </style>
    <div class="error-container">
        <div class="error-heading">Помилка 403</div>
        <div class="error-message">Доступ заборонено!</div>
    </div>