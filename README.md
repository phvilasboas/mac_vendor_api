
# Mac Vendor API SQLITE

Mac vendor query using IEEE OUI as reference

## API Reference

#### Get all items

```http
  GET /mac4.php
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get item

```http
  GET /mac4.php?mac={$mac}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `mac`      | `string` | **Required**. MAC of item to fetch |



## Usage/Examples

```bash
curl -s http://127.0.0.1/mac4.php?mac=00:00:00:00:00:00
```


## Authors

- [@phvilasboas](https://www.github.com/phvilasboas)

## License

[MIT](https://choosealicense.com/licenses/mit/)


