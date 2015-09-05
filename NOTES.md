In `pico.php`, the following changes were made:

1. Properly order posts by date while using an easier to read format of `MMMM DD, YYYY`.

```
  if ($order_by == 'date' && isset($page_meta['date'])) {
      $sorted_pages[$page_meta['date'] . $date_id] = $data;
      $date_id++;
  } else {
```
to

```
  if ($order_by == 'date' && isset($page_meta['date'])) {
      $sorted_pages[$page_meta['date_formatted'] . $date_id] = $data;
      $date_id++;
  } else {
```
