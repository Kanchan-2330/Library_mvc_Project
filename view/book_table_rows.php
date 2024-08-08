<?php foreach ($books as $row) : ?>
  <tr>
    <td><?php echo htmlspecialchars($row["id"]); ?></td>
    <td><?php echo htmlspecialchars($row["title"]); ?></td>
    <td><?php echo htmlspecialchars($row["author"]); ?></td>
    <td><?php echo htmlspecialchars($row["price"]); ?></td>
    <td><?php echo htmlspecialchars($row["stock"]); ?></td>
    <td><?php echo htmlspecialchars($row["language"]); ?></td>
    <td><?php echo htmlspecialchars($row["description"]); ?></td>
    <td><?php echo htmlspecialchars($row["genre"]); ?></td>
    <td>
      <a href='?action=editBookForm&id=<?php echo htmlspecialchars($row["id"]); ?>' class='btn btn-warning btn-sm'>Update</a>
    </td>
    <td>
      <a href='?action=deleteBook&id=<?php echo htmlspecialchars($row["id"]); ?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete this record?")'>Delete</a>
    </td>
  </tr>
<?php endforeach; ?>
<?php if (empty($books)) : ?>
  <tr>
    <td colspan="10">No results</td>
  </tr>
<?php endif; ?>
