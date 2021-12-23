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
                                <svg style='width:100%;height:100%;' id='visual' class='blob-motion' viewbox='0 0 960 540' width='960' height='540' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'>
                                    <g transform='translate(522.0026039102491 273.57989600461275)'>
                                        <path id='blob1' d='M125.3 -138.9C147.8 -102.8 141.4 -51.4 135.7 -5.7C130.1 40.1 125.1 80.1 102.6 111.3C80.1 142.5 40.1 164.7 -11.8 176.5C-63.6 188.3 -127.3 189.6 -169.8 158.4C-212.3 127.3 -233.6 63.6 -222 11.7C-210.3 -40.3 -165.6 -80.6 -123.1 -116.8C-80.6 -152.9 -40.3 -185 5.5 -190.5C51.4 -196 102.8 -175.1 125.3 -138.9' fill='#BB004B'></path>
                                    </g>
                                    <g transform='translate(487.2175717129615 264.5788384126431)' style='visibility: hidden;'>
                                        <path id='blob2' d='M91.4 -103.2C114.4 -68.4 126.2 -34.2 140.9 14.7C155.6 63.6 173.3 127.3 150.3 158.1C127.3 188.9 63.6 187 11.7 175.3C-40.3 163.6 -80.6 142.3 -115.4 111.4C-150.3 80.6 -179.6 40.3 -175.4 4.2C-171.2 -31.8 -133.3 -63.6 -98.5 -98.5C-63.6 -133.3 -31.8 -171.2 1.2 -172.3C34.2 -173.5 68.4 -138 91.4 -103.2' fill='#BB004B'></path>
                                    </g>
                                </svg>
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
