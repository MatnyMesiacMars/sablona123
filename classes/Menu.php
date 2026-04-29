<?php

class Menu
{
    private array $menuData = [
        "header" => [
            "home" => [
                "label" => "Domov",
                "path"  => "/sablona/index.php"
            ],
            "portfolio" => [
                "label" => "Portfólio",
                "path"  => "/sablona/portfolio.php"
            ],
            "qna" => [
                "label" => "Q&A",
                "path"  => "/sablona/qna.php"
            ],
            "kontakt" => [
                "label" => "Kontakt",
                "path"  => "/sablona/kontakt.php"
            ]
        ]
    ];

    /**
     * Returns menu data for a given type
     */
    public function getMenuData(string $type): array
    {
        return $this->menuData[$type] ?? [];
    }

    /**
     * Simple validation if menu type exists
     */
    public function isValidMenuType(string $type): bool
    {
        return isset($this->menuData[$type]);
    }

    /**
     * Prints menu HTML
     */
    public function printMenu(array $menu): void
    {
        foreach ($menu as $item) {
            echo '<li><a href="' . $item['path'] . '">' . $item['label'] . '</a></li>';
        }
    }
}