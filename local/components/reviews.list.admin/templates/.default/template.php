<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?php

if ($USER->IsAdmin()):?>
    <div class="sections-wrapper">
    <?php foreach ($arResult['SECTIONS'] as $section): ?>
        <div class="section">
            <h2><?= $section['NAME'] ?></h2>
            <?php if (!empty($section['ELEMENTS'])): ?>
                <ul class="elements-list">
                    <?php foreach ($section['ELEMENTS'] as $element): ?>
                        <li>
                            <a href="<?= $element['DETAIL_PAGE_URL'] ?>"><?= $element['NAME'] ?></a>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>В этом разделе пока нет элементов.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php if (isset($_SESSION['result'])) {
        echo '<div class="result">';
        echo $_SESSION['result'];
        echo '</div>';
        unset($_SESSION['result']);
} ?>
<?php else: ?>

<div class="sections-wrapper">
    <?php foreach ($arResult['SECTIONS'] as $section): ?>
        <div class="section">
            <h2><?= $section['NAME'] ?></h2>
            <?php if (!empty($section['ELEMENTS'])): ?>
                <ul class="elements-list">
                    <?php foreach ($section['ELEMENTS'] as $element): ?>
                        <li>
                            <a href="<?= $element['DETAIL_PAGE_URL'] ?>"><?= $element['NAME'] ?></a>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>В этом разделе пока нет элементов.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>