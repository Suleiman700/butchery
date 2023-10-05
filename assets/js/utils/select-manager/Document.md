
# **SelectManager**

```plaintext
[]: # Author: Suleiman
[]: # Last Update: December 29 2022        
[]: # Version: 1.0
```

---

## About

`SelectManager` is a concept of code that makes it easier for developers to manage selects in their project,
This can be accomplished by creating object for each select, And since all selects will share the same methods you will
just have to control the object which will control the select for you.

------

## How Does It Work ?

`SelectManager` is very simple, it takes a few parameters upon creating the manager object, and it contains some useful
methods you can use such as (set options, get selected option...etc).

You can basically import your select object into your script and start managing it without the need to use `document.querySelector`.

On each method you call, `SelectManager` will look for your select in the DOM and modify it.

Please note that if you try to create manager object for select that cannot be found in the DOM you will get an error message

------

## How To Use ?

Here is an example of how to use `SelectManager`.

First, You'll have to create a new file for your select.

Please note that you'll need to pass select parent id and select id:

| Parameter | Description                           | Type     | Required |
|-----------|---------------------------------------|----------|----------|
| _parentId | The parent id of the select           | string   | ✓        |
| _id       | The id of the select                  | string   | ✓        |
| _cb       | Callback function on element onChange | function | x        |

```javascript
// File: select_country.js
import SelectManager from '/javascript/helpers/handlers/selects/SelectManager.js'

const parentId = 'mainDivId'
const id = 'mySelectId'

// onChange callback
function on_change(_object) {
    // _object is the manager object itself
}

// Build object
const select_country = new SelectManager(parentId, id, on_change)

export default select_country
```

Second, You can import this file in your script and start working on it.

```javascript
// File: init.js
import select_country from './selects/select_country.js'

// Enable onChange event listener
select_country.enableOnChangeEvent()

// Put options into the select
const options = [
    {
        id: 0, // value
        name: 'USA' // Text
    },
    {
        id: 1, // Value
        name: 'Russia' // Text
    },
]
select_country.put_options(options, 'id', 'name')

// Set selected country by its id (will select USA + trigger onChange event)
select_country.set_selected_option_by_value(0)
```

------

## Methods

| Method                         | Description                                                                 | Takes                                     | Return  |
|--------------------------------|-----------------------------------------------------------------------------|-------------------------------------------|---------|
| areOptionsSet()                | Check if the options are set                                                | -                                         | boolean |
| clearOptions()                 | Clear select options                                                        | -                                         | -       |
| deselect()                     | Deselect selected option & trigger onChange event                           | -                                         | -       |
| enabled()                      | Enable or disable the select                                                | boolean                                   | -       |
| enableOnChangeEvent()          | Enable element's onChange event (depends on the _cb you pass upon creating) | -                                         | -       |
| put_options()                  | Put options into select                                                     | array of objects, value's key, text's key | -       |
| saveOptions()                  | Save select's options into the class                                        | -                                         | -       |
| set_selected_option_by_value() | Set selected option by its value & trigger onChange event                   | value (usually id)                        | -       |
| get_selected_value()           | Get the selected option's value                                             | -                                         | string  |
| get_selected_text()            | Get the selected option's text                                              | -                                         | string  |