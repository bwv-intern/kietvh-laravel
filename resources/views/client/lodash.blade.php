<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reseach Lodas Library</title>
    <script src="
                            https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js
                            "></script>
</head>

<body>
    <h2>Open Console</h2>
    <script>

        // LODASH

        /*
        **    Array
        */
        // chunk : trong lodash được sử dụng để chia một mảng thành các mảng con nhỏ dựa trên kích thước được chỉ định
        _.chunk(['a', 'b', 'c', 'd'], 2);

        // Hàm _.compact trong lodash được sử dụng để loại bỏ các giá trị falsy khỏi một mảng,
        // bao gồm các giá trị như false, null, 0, "" (chuỗi rỗng), undefined, và NaN.

        _.compact([0, 1, false, 2, '', 3]); // => output : [1, 2, 3]

        //Hàm _.concat trong lodash được sử dụng để nối các mảng hoặc giá trị vào một mảng mới
        var array = [1];
        var other = _.concat(array, 2, [3], [[4]]);
        console.log(other);
        // => [1, 2, 3, [4]]

        console.log(array);
        // => [1]

       // Hàm _.findIndex trong lodash được sử dụng để tìm kiếm index của phần tử đầu tiên trong một mảng thỏa mãn điều kiện được xác định
        var users = [
        { 'user': 'barney',  'active': false },
        { 'user': 'fred',    'active': false },
        { 'user': 'pebbles', 'active': true }
        ];

        _.findIndex(users, function(o) { return o.user == 'barney'; });
        // => 0

        //map
        var numbers = [1, 2, 3];
        const doubled = _.map(numbers, n => n * 2);
        console.log("doubled = ", doubled); // Output: [2, 4, 6]


        //filter
        numbers = [1, 2, 3, 4, 5];
        const evens = _.filter(numbers, n => n % 2 === 0);
        console.log("evens = ", evens); // Output: [2, 4]


        //groupBy
         users = [{
                name: 'John',
                age: 30
            },
            {
                name: 'Jane',
                age: 25
            },
            {
                name: 'Doe',
                age: 30
            }
        ];
        const groupedByAge = _.groupBy(users, 'age');
        console.log("groupedByAge", JSON.stringify(groupedByAge));
        // Output: { '25': [{ name: 'Jane', age: 25 }], '30': [{ name: 'John', age: 30 }, { name: 'Doe', age: 30 }] }


        //sortBy
        users = [{
                name: 'John',
                age: 30
            },
            {
                name: 'Jane',
                age: 25
            },
            {
                name: 'Doe',
                age: 35
            }
        ];
        const sortedByAge = _.sortBy(users, 'age');
        console.log("sorted by age", JSON.stringify(sortedByAge));
        // Output: [{ name: 'Jane', age: 25 }, { name: 'John', age: 30 }, { name: 'Doe', age: 35 }]


        //merge
        const object = {
        'a': [{ 'b': 2 }, { 'd': 4 }]
        };

        const other = {
        'a': [{ 'c': 3 }, { 'e': 5 }]
        };
        const merged = _.merge(object, other);
        console.log("merged: ", JSON.stringify(merged));
        // Output: { 'a': [{ 'b': 2, 'c': 3 }, { 'd': 4, 'e': 5 }] }
    </script>
</body>

</html>
