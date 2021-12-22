<?php

namespace App\DataFixtures;

use App\Entity\Page;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture implements FixtureGroupInterface
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
        $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user   ->setEmail($_ENV["ADMIN_EMAIL"])
                ->setRoles(["ROLE_ADMIN"])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setIsVerified(true);
        $password = $this->hasher->hashPassword($user,$_ENV["ADMIN_PLAIN_PASSWORD"]);
        $user->setPassword($password);

        $manager->persist($user);

        $page = new Page();
        
        $page           ->setName("Accueil")
                        ->setSlug("accueil")
                        ->setContent("
                            <section class='section bg-primary'>
                                <h1>Nice Curves</h1>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore repellat unde beatae, eum tenetur aliquid nostrum iste magni eius rem nam quidem facere praesentium quisquam, laborum natus sapiente saepe obcaecati!</p>
                            </section>
                            <svg  style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#0D6EFD'></rect><path d='M0 357L22.8 372.8C45.7 388.7 91.3 420.3 137 414.2C182.7 408 228.3 364 274 336.5C319.7 309 365.3 298 411.2 303.8C457 309.7 503 332.3 548.8 348.7C594.7 365 640.3 375 686 373.2C731.7 371.3 777.3 357.7 823 358.5C868.7 359.3 914.3 374.7 937.2 382.3L960 390L960 541L937.2 541C914.3 541 868.7 541 823 541C777.3 541 731.7 541 686 541C640.3 541 594.7 541 548.8 541C503 541 457 541 411.2 541C365.3 541 319.7 541 274 541C228.3 541 182.7 541 137 541C91.3 541 45.7 541 22.8 541L0 541Z' fill='#FFC107' stroke-linecap='round' stroke-linejoin='miter'></path></svg>
                            <section class='section bg-warning'>
                                <h1>Nice Curves</h1>
                                <p>Rerum magnam totam eos distinctio laudantium corrupti id, odio nam nisi animi eum quisquam omnis possimus recusandae dolorum natus unde molestias reiciendis harum dolores repellat. Molestiae veritatis aspernatur velit ipsa!</p>
                            </section>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#FFC107'></rect><path d='M0 281L64 286L128 263L192 247L256 224L320 238L384 335L448 328L512 245L576 225L640 236L704 283L768 299L832 343L896 271L960 325L960 541L896 541L832 541L768 541L704 541L640 541L576 541L512 541L448 541L384 541L320 541L256 541L192 541L128 541L64 541L0 541Z' fill='#f5730a'></path><path d='M0 377L64 394L128 320L192 382L256 407L320 400L384 386L448 373L512 339L576 400L640 415L704 345L768 391L832 329L896 316L960 317L960 541L896 541L832 541L768 541L704 541L640 541L576 541L512 541L448 541L384 541L320 541L256 541L192 541L128 541L64 541L0 541Z' fill='#ed5330'></path><path d='M0 491L64 467L128 464L192 434L256 448L320 481L384 451L448 452L512 455L576 450L640 412L704 445L768 450L832 404L896 399L960 447L960 541L896 541L832 541L768 541L704 541L640 541L576 541L512 541L448 541L384 541L320 541L256 541L192 541L128 541L64 541L0 541Z' fill='#dc3545'></path></svg>
                            <section class='section bg-danger'>
                                <h1>Nice Curves</h1>
                                <p>Libero recusandae tempora cum! Soluta esse modi ab. Veniam nam temporibus praesentium aliquam aspernatur, voluptate quibusdam necessitatibus velit ratione neque laudantium minima similique. Corporis voluptas nobis unde enim harum libero.</p>
                            </section>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#DC3545'></rect><path d='M0 401L137 401L137 355L274 355L274 451L411 451L411 371L549 371L549 403L686 403L686 360L823 360L823 419L960 419L960 359L960 541L960 541L823 541L823 541L686 541L686 541L549 541L549 541L411 541L411 541L274 541L274 541L137 541L137 541L0 541Z' fill='#6C757D' stroke-linecap='square' stroke-linejoin='miter'></path></svg>
                            <section class='section bg-secondary'>
                                <h1>Nice Curves</h1>
                                <p>Dolores culpa iusto eaque assumenda error incidunt quisquam voluptatibus magnam deserunt, cumque, quasi, autem rerum. Amet tenetur quas nemo eos, cumque pariatur saepe sit deleniti odit consequatur quod, aperiam velit.</p>
                            </section>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#6C757D'></rect><path d='M0 314L74 254L148 418L222 239L295 265L369 295L443 242L517 377L591 349L665 330L738 385L812 276L886 382L960 428L960 541L886 541L812 541L738 541L665 541L591 541L517 541L443 541L369 541L295 541L222 541L148 541L74 541L0 541Z' fill='#212529' stroke-linecap='square' stroke-linejoin='bevel'></path></svg>
                            <section class='section'>
                                <h1>Nice Curves</h1>
                                <p>Officia animi optio voluptate non, minima excepturi qui error quisquam. Perferendis dolores accusamus vitae veniam, architecto quod! Maiores assumenda quas aliquam corrupti consectetur recusandae perspiciatis, excepturi quae, vitae asperiores adipisci.</p>
                            </section>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#212529'></rect><path d='M0 314L12.3 304C24.7 294 49.3 274 74 291.3C98.7 308.7 123.3 363.3 148 360.8C172.7 358.3 197.3 298.7 221.8 273.2C246.3 247.7 270.7 256.3 295.2 265.7C319.7 275 344.3 285 369 281.2C393.7 277.3 418.3 259.7 443 273.3C467.7 287 492.3 332 517 349.8C541.7 367.7 566.3 358.3 591 350.5C615.7 342.7 640.3 336.3 664.8 342.3C689.3 348.3 713.7 366.7 738.2 357.7C762.7 348.7 787.3 312.3 812 311.8C836.7 311.3 861.3 346.7 886 372C910.7 397.3 935.3 412.7 947.7 420.3L960 428L960 541L947.7 541C935.3 541 910.7 541 886 541C861.3 541 836.7 541 812 541C787.3 541 762.7 541 738.2 541C713.7 541 689.3 541 664.8 541C640.3 541 615.7 541 591 541C566.3 541 541.7 541 517 541C492.3 541 467.7 541 443 541C418.3 541 393.7 541 369 541C344.3 541 319.7 541 295.2 541C270.7 541 246.3 541 221.8 541C197.3 541 172.7 541 148 541C123.3 541 98.7 541 74 541C49.3 541 24.7 541 12.3 541L0 541Z' fill='#202731' stroke-linecap='round' stroke-linejoin='miter'></path></svg>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#202731'></rect><path d='M0 114L16 121.8C32 129.7 64 145.3 96 142.5C128 139.7 160 118.3 192 122.7C224 127 256 157 288 170.2C320 183.3 352 179.7 384 180C416 180.3 448 184.7 480 180.2C512 175.7 544 162.3 576 162.7C608 163 640 177 672 189.2C704 201.3 736 211.7 768 207.5C800 203.3 832 184.7 864 164.5C896 144.3 928 122.7 944 111.8L960 101L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#006a8d'></path><path d='M0 325L16 322.7C32 320.3 64 315.7 96 299.7C128 283.7 160 256.3 192 242.8C224 229.3 256 229.7 288 233.5C320 237.3 352 244.7 384 256.3C416 268 448 284 480 291.2C512 298.3 544 296.7 576 298.5C608 300.3 640 305.7 672 302.8C704 300 736 289 768 291.3C800 293.7 832 309.3 864 306.3C896 303.3 928 281.7 944 270.8L960 260L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#0398bf'></path><path d='M0 372L16 374.3C32 376.7 64 381.3 96 388.7C128 396 160 406 192 402.5C224 399 256 382 288 375.5C320 369 352 373 384 380.5C416 388 448 399 480 403.3C512 407.7 544 405.3 576 404.2C608 403 640 403 672 410.2C704 417.3 736 431.7 768 422.8C800 414 832 382 864 366.3C896 350.7 928 351.3 944 351.7L960 352L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#0dcaf0'></path></svg>
                            <section class='section bg-info'>
                                <h1>Nice Curves</h1>
                                <p>Doloremque enim ullam expedita id veniam assumenda delectus reiciendis asperiores laudantium aut dignissimos ratione, autem dolorem dolore animi quidem, error hic iusto. Eveniet quae illum ab voluptas odit. Eveniet, possimus.</p>
                                <svg style='width:100%;height:100%;' id='visual' class='blob-motion' viewbox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'>
                                    <g transform='translate(522.0026039102491 273.57989600461275)'>
                                        <path id='blob1' d='M125.3 -138.9C147.8 -102.8 141.4 -51.4 135.7 -5.7C130.1 40.1 125.1 80.1 102.6 111.3C80.1 142.5 40.1 164.7 -11.8 176.5C-63.6 188.3 -127.3 189.6 -169.8 158.4C-212.3 127.3 -233.6 63.6 -222 11.7C-210.3 -40.3 -165.6 -80.6 -123.1 -116.8C-80.6 -152.9 -40.3 -185 5.5 -190.5C51.4 -196 102.8 -175.1 125.3 -138.9' fill='#BB004B'></path>
                                    </g>
                                    <g transform='translate(487.2175717129615 264.5788384126431)' style='visibility: hidden;'>
                                        <path id='blob2' d='M91.4 -103.2C114.4 -68.4 126.2 -34.2 140.9 14.7C155.6 63.6 173.3 127.3 150.3 158.1C127.3 188.9 63.6 187 11.7 175.3C-40.3 163.6 -80.6 142.3 -115.4 111.4C-150.3 80.6 -179.6 40.3 -175.4 4.2C-171.2 -31.8 -133.3 -63.6 -98.5 -98.5C-63.6 -133.3 -31.8 -171.2 1.2 -172.3C34.2 -173.5 68.4 -138 91.4 -103.2' fill='#BB004B'></path>
                                    </g>
                                </svg>
                            </section>
                            <svg style='width:100%;height:100%;' id='visual' viewBox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'><rect x='0' y='0' width='960' height='540' fill='#0DCAF0'></rect><path d='M0 266L16 260.5C32 255 64 244 96 238.8C128 233.7 160 234.3 192 231.5C224 228.7 256 222.3 288 223.7C320 225 352 234 384 236.3C416 238.7 448 234.3 480 241.5C512 248.7 544 267.3 576 275.5C608 283.7 640 281.3 672 274.3C704 267.3 736 255.7 768 244.8C800 234 832 224 864 218.7C896 213.3 928 212.7 944 212.3L960 212L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#e4e8ec'></path><path d='M0 340L16 336.7C32 333.3 64 326.7 96 326.8C128 327 160 334 192 327.8C224 321.7 256 302.3 288 294.2C320 286 352 289 384 288.7C416 288.3 448 284.7 480 282C512 279.3 544 277.7 576 279.2C608 280.7 640 285.3 672 290.5C704 295.7 736 301.3 768 302.7C800 304 832 301 864 299.8C896 298.7 928 299.3 944 299.7L960 300L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#eef0f3'></path><path d='M0 358L16 354.5C32 351 64 344 96 341C128 338 160 339 192 338C224 337 256 334 288 341.7C320 349.3 352 367.7 384 368.2C416 368.7 448 351.3 480 345.2C512 339 544 344 576 352.3C608 360.7 640 372.3 672 373C704 373.7 736 363.3 768 363.3C800 363.3 832 373.7 864 373.8C896 374 928 364 944 359L960 354L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#f8f9fa'></path><path d='M0 403L16 407.3C32 411.7 64 420.3 96 424.3C128 428.3 160 427.7 192 423.7C224 419.7 256 412.3 288 410.7C320 409 352 413 384 415C416 417 448 417 480 416.3C512 415.7 544 414.3 576 416.2C608 418 640 423 672 425.7C704 428.3 736 428.7 768 422C800 415.3 832 401.7 864 395.8C896 390 928 392 944 393L960 394L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#f9fafb'></path><path d='M0 486L16 486.3C32 486.7 64 487.3 96 483.7C128 480 160 472 192 466.3C224 460.7 256 457.3 288 457.8C320 458.3 352 462.7 384 465.5C416 468.3 448 469.7 480 473.2C512 476.7 544 482.3 576 482.7C608 483 640 478 672 474.5C704 471 736 469 768 469.8C800 470.7 832 474.3 864 474.2C896 474 928 470 944 468L960 466L960 541L944 541C928 541 896 541 864 541C832 541 800 541 768 541C736 541 704 541 672 541C640 541 608 541 576 541C544 541 512 541 480 541C448 541 416 541 384 541C352 541 320 541 288 541C256 541 224 541 192 541C160 541 128 541 96 541C64 541 32 541 16 541L0 541Z' fill='#fafbfc'></path></svg>
                            <section class='section bg-light text-dark'>
                                <h1>Nice Curves</h1>
                                <p>Accusamus facilis numquam, dicta consequuntur autem reiciendis voluptate, excepturi odio fuga tenetur atque molestiae, inventore saepe nihil. Quisquam velit quae, dicta eligendi optio alias officiis aliquid, recusandae pariatur incidunt maiores!</p>
                            </section>
                        ")
                        ->setStatus("Publique")
                        ->setPublicatedAt(new \DateTime())
                        ;
        $manager->persist($page);

        $manager->flush();

    }

    public static function getGroups():array
    {
        return ["admin"];
    }
}
