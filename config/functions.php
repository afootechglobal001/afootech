<?php
function _otherPagesBtn($websiteUrl)
{ ?>
<div class="other-pages-btn-div">
    <a href="<?php echo $websiteUrl ?>/training">
        <button class="btn" title="Apply For Training">Apply For Training <i class="bi-arrow-right"></i></button></a>

    <a href="<?php echo $websiteUrl ?>/training">
        <button class="btn right-btn" title="SIWES/IT Program"><strong>SIWES/IT Program</strong> <i
                class="bi-arrow-right"></i></button></a>
</div>
<?php } ?>

<?php
function _otherPagesTitleContent($props)
{
    global $websiteUrl, $appName;

    $title = $props['title'] ?? '';
    $highlight = $props['highlight'] ?? '';
    $description = $props['description'] ?? '';
    $image = $props['image'] ?? '/all-images/images/default.png';
    $breadcrumbs = $props['breadcrumbs'] ?? [];
    ?>
<div class="other-pages-back-div">
    <div class="nav-title">
        <ul>
            <?php foreach ($breadcrumbs as $breadcrumb): ?>
            <a href="<?php echo $breadcrumb['url']; ?>">
                <li title="<?php echo htmlspecialchars($breadcrumb['title']); ?>">
                    <?php echo htmlspecialchars($breadcrumb['title']); ?>

                    <?php if (!$breadcrumb['last']) { ?>
                    <span><i class="bi-caret-right-fill"></i></span>
                    <?php } ?>
                </li>
            </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="main-content-back-div">
        <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
            <h1 data-aos="fade-in" data-aos-duration="800">
                <?php echo htmlspecialchars($title); ?>
                <?php if ($highlight) { ?>
                <span><?php echo htmlspecialchars($highlight); ?></span>
                <?php } ?>
            </h1>

            <p>
                <?php echo htmlspecialchars($description); ?>
            </p>

            <?php _otherPagesBtn($websiteUrl); ?>
        </div>

        <div class="image-div">
            <img src="<?php echo $websiteUrl . $image; ?>"
                alt="<?php echo htmlspecialchars($appName . ' ' . $title); ?>">
        </div>
    </div>
</div>
<?php
}