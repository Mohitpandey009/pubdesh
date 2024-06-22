<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Domain Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Domain Data</h2>
    <table>
        <tr>
            <th>Publisher ID</th>
            <th>Property</th>
            <th>Domains</th>
        </tr>
        <?php
        // Assuming $domain contains the fetched data including pub_id, PROP_id, domain_id, and domain

        // Group data by pub_id and property
        $groupedData = [];
        foreach ($domain as $row) {
            $pub_id = $row['pub_id'];
            $property = $row['property'];

            if (!isset($groupedData[$pub_id])) {
                $groupedData[$pub_id] = [];
            }

            if (!isset($groupedData[$pub_id][$property])) {
                $groupedData[$pub_id][$property] = [];
            }

            $groupedData[$pub_id][$property][] = $row['domain'];
        }

        // Print the table
        foreach ($groupedData as $pub_id => $properties) {
            $pub_id_rowspan = count($properties);
            $firstProperty = true;

            foreach ($properties as $property => $domains) {
                ?>
                <tr>
                    <?php if ($firstProperty) : ?>
                        <td rowspan="<?= $pub_id_rowspan ?>"><?= htmlspecialchars($pub_id) ?></td>
                        <?php $firstProperty = false; ?>
                    <?php endif; ?>
                    <td><?= htmlspecialchars($property) ?></td>
                    <td>
                        <?php foreach ($domains as $domain) : ?>
                            <?= htmlspecialchars($domain) ?><br>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>
