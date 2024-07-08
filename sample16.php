<body>
    <div>
        <?php
            for ($x = 1; $x < 101; $x++) {
                if ($x % 5 == 0 && $x % 3 == 0) {
                    print('FizzBuzz');
                } elseif ($x % 5 == 0) {
                    print('Buzz');
                } elseif ($x % 3 == 0) {
                    print('Fizz');
                } else {
                    print($x);
                }
                print('<br>');
            }
        ?>
    </div>
</body>