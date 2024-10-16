<pre><?php print_r($results); ?></pre>
<ul>
    <?php foreach ($results as $row): ?>
        <li><?php echo $row->name;?></li>
        <li><?php echo $row->phone;?></li>
    <?php endforeach; ?>
</ul>
