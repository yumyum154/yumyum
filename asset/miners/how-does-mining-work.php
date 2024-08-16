<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="A brief description of your page that includes relevant keywords and entices users to click.">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="robots" content="index, follow">
    <meta name="author" content="ready wears collection">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <title>BITFARMS LTD (BITF STOCK) | BITCOIN MINING</title>

    <link rel="canonical" href="https://www.yoursite.com/preferred-page-url">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="ready wears">
    <meta property="og:description" content="A brief description of your page">
    <meta property="og:image" content="https://www.yoursite.com/image.jpg">
    <meta property="og:url" content="https://www.yoursite.com/page-url">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ready wears collection">
    <meta name="twitter:description" content="A brief description of your page">
    <meta name="twitter:image" content="https://www.yoursite.com/image.jpg">

    <!-- css and favicon -->
    <link rel="shortcut icon" href="/readywears/asset/svgs/favicon-3.svg" type="image/x-icon">
    <link rel="stylesheet" href="/readywears/asset/css/style.css"">
</head>

<body>

<div class=" page-container">
    <?php include '../global/header.php' ?>
    <main>
        <div class="governance-header">
            <div class="togglebtn" data-target="#gov_header">
                <img src="/readywears/asset/svgs/menu1.svg" alt="" class="open">
                <img src="/readywears/asset/svgs/close.svg" alt="" class="close">
            </div>
            <nav>
                <ul id="gov_header">
                    <li><a href="/readywears/asset/miners/miners.php">miners</a></li>
                    <li><a href="/readywears/asset/miners/what-is-bitcoin-mining.php">what is bitcoin mining?</a></li>
                    <li><a href="/readywears/asset/miners/why-is-bitcoin-mining-important.php">why is bitcoin mining
                            important?</a></li>
                    <li><a href="/readywears/asset/miners/how-does-mining-work.php">how does bitcoin mining works?</a>
                    </li>
                    <li><a href="/readywears/asset/miners/bitcoin-mining-facts-myths.php">bitcoin mining facts and
                            myths?</a></li>
                </ul>
            </nav>
        </div>
        <section class="company page">
            <div class="container-large">
                <div class="company-row">
                    <div class="company-col">
                        <h1 class="title">
                            miners
                        </h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="page">
            <div class="container-large">
                <div class="page-wrapper">
                    <div class="row">
                        <div>
                            <h1 class="title">How Does Mining Work?</h1>
                            <p>
                                Bitcoin is powered by an incredible amount of sophisticated technology, namely the
                                blockchain. Blockchain is a digital record of all the verified transactions made on a
                                particular cryptocurrency, consisting of a series of "blocks". Each block consists of a
                                series of transactions of bitcoins between users, represented by an alphanumeric string
                                called an address. Each of these transactions are shared with a network resource called
                                the memory pool (also known as the mempool.) Transactions aren't recognized by the
                                network until they are added from the mempool to the blockchain.
                            </p>
                            <p class="description">
                                In order to send bitcoin to someone's address, the sending user needs to include fees to
                                incentivize miners picking their transaction out of all the ones available in the
                                mempool. Because blocks have a size capacity, miners select the transactions that
                                deliver the most revenue, and therefore the ones with the highest fees. They then create
                                a block made of these transactions and push it across the network to be validated by
                                nodes
                            </p>
                        </div>
                        <div>
                            <p>
                                <img src="../svgs/blocks.svg" alt="">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page_last">
            <div class="container-large">
                <div class="page_last_wrapper">
                    <div class="page_last_col">
                        <div class="head togglebtn" data-target="#content1">
                            <h1 class="title">proof of work</h1>
                            <div>
                                <img src="../svgs/plus.svg" alt="" class="open">
                                <img src="../svgs/minus.svg" alt="" class="close">
                            </div>
                        </div>
                        <div class="page_last_content" id="content1">
                            <p>
                                Proof of work is at the center of the bitcoin network. Without it, users would attempt
                                to modify the blockchain to benefit themselves, taking advantage of the network's
                                decentralized nature. Miners must show literal proof that they have done work to create
                                a valid block in the form of computation. Proofs are chained together between blocks,
                                which makes it difficult for anyone to reverse a previous transaction. This is how proof
                                of work mining keeps the network secure.
                            </p>
                            <p>
                                Proof of Work ensures that network participants share the same copy of the blockchain
                                and safeguards against funds being spent more than once. This is a common issue for
                                payment networks without a centralized authority.
                            </p>
                            <p>
                                The algorithm is created by the repeated running of hash functions, a mathematical
                                operation that takes a string of data and transforms it into a fixed-length number. That
                                number is then considered a "hash." Each hash is unique to an input and can't be
                                calculated in reverse, which maintains the input's privacy.
                            </p>
                            <p>
                                Bitcoin relies on Secure Hash Algorithm 256 (SHA-256) to output a value that is 256 bits
                                long. These values are usually displayed in digits that range from 0-9 and characters
                                a-f, referred to as base-16. They typically look like a combination of numbers and
                                letters shuffled together. The National Security Agency created SHA-256 in 2001 and is
                                regarded as extremely secure.
                            </p>
                        </div>
                    </div>
                    <div class="page_last_col">
                        <div class="head togglebtn" data-target="#content2">
                            <h1 class="title">Difficulty Adjustment</h1>
                            <div>
                                <img src="../svgs/plus.svg" alt="" class="open">
                                <img src="../svgs/minus.svg" alt="" class="close">
                            </div>
                        </div>
                        <div class="page_last_content" id="content2">
                            <p>
                                One of Bitcoin's goals is to produce on average a block every ten minutes. This time
                                reduces chain splits, where the appearance of two valid but competing blocks occur due
                                to the time it takes for new blocks to reach miners globally.
                            </p>
                            <p>
                                To maintain this ten minute interval in the midst of network hash rate changes, Bitcoin
                                adjusts the difficulty for miners to find valid proofs of work. This "difficulty
                                adjustment" occurs roughly every two weeks, at every 2,016 blocks.
                            </p>
                            <p>
                                Difficulty can be lowered to help make it easier for miners to identify blocks if they
                                require longer than ten minutes to be produced. It can also be raised to make it harder.
                                Difficulty is adjusted to maintain that interval average and keep the issuance of
                                bitcoin at a consistent pace, unaffected by changes in hash rate.
                            </p>
                        </div>
                    </div>
                    <div class="page_last_col">
                        <div class="head togglebtn" data-target="#content3">
                            <h1 class="title">Halvings</h1>
                            <div>
                                <img src="../svgs/plus.svg" alt="" class="open">
                                <img src="../svgs/minus.svg" alt="" class="close">
                            </div>
                        </div>
                        <div class="page_last_content" id="content3">
                            <p>
                                The number of bitcoins available to be created and used is capped at 21 million. In
                                order to maintain this restriction, "halvings" occur every 210,000 blocks, or roughly
                                every four years. Halvings are when the Bitcoin network halves the block subsidy that
                                miners are paid for creating new blocks.
                            </p>
                            <p>
                                In 2009, when the network launched, miners were paid 50 bitcoin for every block. Three
                                halvings have occurred by then, leaving miners earning 6.25 bitcoin per block until the
                                next halving in 2024. The idea is that repeated halvings will reduce the block subsidy
                                to 0 in the year 2140. When that occurs, no new bitcoin will enter circulation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include '../global/footer.php' ?>
    </div>
    </body>

</html>