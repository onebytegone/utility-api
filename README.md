# Utility API

Nothing too remarkable, just a simple PHP API to provide basic utility functionality. Comes in handy when you want simple data generated or just a basic JSON or JSONP endpoint.


## Endpoints

### `/summary`

Returns a nice data medley to choose from.

### `/ip`

Gathers what IP the server sees the traffic coming from.

_Example Response:_

```
{
   "ip": "255.255.255.255"
}
```

### `/time`

Outputs the current UTC and timestamp.

_Example Response:_

```
{
   "utc": "2015-11-28T23:57:51",
   "timestamp": 1448755071
}
```

### `/color`

Selects five random colors, can't guarantee they'll go well together though.

_Example Response:_

```
{
   "colors": [
      "#43eea9",
      "#faeb61",
      "#0b837f",
      "#641a6a",
      "#ae97d4"
   ]
}
```


## License

This project is released under the MIT license. See LICENSE.md for more information.
