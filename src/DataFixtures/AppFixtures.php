<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        //Customers(2)
        $today = new \DateTime();

        $customer1 = new Customer();
        // $customer1->setUsername("MobilePhoneandCo");
        $customer1->setPassword($this->passwordHasher->hashPassword($customer1, "000000000000MobilePhone?#"));
        $customer1->setEmail("mobilephoneandco@gmail.com");
        $customer1->setCreatedAt($today);
        $customer1->setRoles([]);
        $manager->persist($customer1);

        $customer2 = new Customer();
        // $customer2->setUsername("PhoneCompany");
        $customer2->setPassword($this->passwordHasher->hashPassword($customer2, "111111111111PhoneCompany?#"));
        $customer2->setEmail("phone.company@gmail.com");
        $customer2->setCreatedAt($today);
        $customer2->setRoles([]);
        $manager->persist($customer2);

        $manager->flush();

        //Users(5)

        $data = [
            "email"=>["user1@gmail.com","user2@gmail.com","user3@gmail.fr", "user4@gmail.com","user5@gmail.com"],
            "firstName"=>["Edouard","Jean","Ernest","Martine","Louise"],
            "lastName"=>["Leclerc","Latour","Dupont","Durand","Chateau"]
        ];
        for ($i = 0; $i < count($data['email']); $i++) {
            $user = new User();
            $user->setEmail($data["email"][$i]);
            $user->setFirstName($data["firstName"][$i]);
            $user->setLastName($data["lastName"][$i]);
            $user->setCreatedAt($today);
            if($i%2===0){
                $user->setCustomer($customer1);
            }else{
                $user->setCustomer($customer2);
            }
            $manager->persist($user);
        }
        $manager->flush();

        //Products(10)

        $data2 = [
            "name" => ['XIAOMI REDMI NOTE 11 BLEU', 'APPLE IPHONE 13 PRO MAX BLANC', 'SAMSUNG GALAXY S20 NOIR', 'SAMSUNG GALAXY S21 ARGENT', 'APPLE IPHONE 13 PRO MAX OR', 'XIAOMI 11 LITE NOIR', 'GOOGLE PIXEL 6 BLEU', 'XIAOMI REDMI NOTE 10 BLANC', 'ONEPLUS ONEPLUS 9 BLEU', 'APPLE IPHONE XR NOIR'],
            "description" => [
                "4go ram+128go de stockage-snapdragon 680.",
                "OS iOS 15 - 128Go de ROM.",
                "Grand écran ultra fluide Infinity 6,5 Full HD+ : (2400 x 1080) – 405 ppp 120 Hz.",
                "OS Android 12 - 128Go de ROM 6Go de RAM.",
                "OS iOS 15 - 128Go de ROM.",
                "OS Android - 128Go de ROM, 8Go de RAM.",
                "OS Android - 128Go de ROM, 12Go de RAM.",
                "MIUI 12 basé sur Android 11 - 128 Go de ROM et 6 Go de RAM.",
                "Qualcomm® snapdragon™ 888.",
                "OS iOS 15 - 256Go de ROM."
            ],
            "price" => [1267.99, 910.99, 887.90, 899, 752.50, 855, 1165.99, 926.76, 1003.99, 698],
            "brand" => ['Xiaomi', 'Apple', 'Samsung', 'Samsung', 'Samsung', 'Apple', 'Google', 'Xiaomi', 'One Plus', 'Apple']

        ];

        for ($i = 0; $i < count($data2['name']); $i++) {
            $product = new Product();
            $product->setName($data2['name'][$i]);
            $product->setDescription($data2['description'][$i]);
            $product->setPrice($data2['price'][$i]);
            $product->setCurrency('EUR');
            $product->setBrand($data2['brand'][$i]);
            $product->setCreatedAt($today);
            $manager->persist($product);
        }

        $manager->flush();


    }
}
