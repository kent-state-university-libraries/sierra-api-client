# Sierra PHP API Class

This PHP class allows you to connect to Sierra's API and make queries.

## Example Usage

### Authenticating

Before running any query, you will need to authenticate with your API client/secret

```
include('Sierra.php');

$s = new Sierra(array(
  'endpoint' => 'Sierra REST API Endpoint (ie https://lib.example.edu/iii/sierra-api/v1/)',
  'key' => 'Sierra Client Key',
  'secret' => 'Sierra Client Secret'
  'tokenFile' => 'Location to the temp file to keep token infomation, default: /tmp/SierraToken'
 ));
 ```

### Example 1

This example gets information on bib ID 3996024 and limits the results to 20 records only including the fields id, location, and status.

```
$bibInformation = $s->query('items', array(
  'bibIds' => '3996024',
  'limit' => '20',
  'fields' => 'id,location,status'
));
```

### Example 2

This example gets the first ten bib records with CAT DATE between May 1, 2017 and May 15, 2017

```
$query = '{
  "target": {
    "record": {
      "type": "bib"
    },
    "id": 28
  },
  "expr": {
    "op": "between",
    "operands": [
      "05-01-2017",
      "05-15-2017"
    ]
  }
}';
$bibInformation = $s->query('bibs/query?offset=0&limit=10', $query, FALSE, 'POST');
```

#### License [MIT License](LICENSE.txt)