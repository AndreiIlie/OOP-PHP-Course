<h1><?php echo $data['test']; ?></h1>
<h4>This is a test page that outputs the parameters sent through GET to it in a table.</h4>
<p>Your parameters were</p>
<table class="table table-sm">
    <thead class='thead-light'>
        <tr>
        <th scope="col">Index</th>
        <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data['params'] as $index => $value) {
        echo
        '<tr>
            <th scope="row">' . $index . '</th>
            <td>' . $value . '</td>
        </tr>';
    }
    ?>
  </tbody>
</table>
