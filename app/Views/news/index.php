<h4><?= dot_array_search('row1.subrow1.hexlet', $array) ?></h4>
<h4><?= array_deep_search('red', $array) ?></h4>    

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <div class="card text-white bg-info mb-3 ms-3" style="max-width: 20rem;">
            <div class="card-header"><?= esc($news_item['title']) ?></div>
            <div class="card-body">
                <p class="card-text"><?= esc($news_item['body']) ?></p>
                <p class="card-text"><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>
            </div>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>