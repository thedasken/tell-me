<?php

namespace App\Enums;

enum Mood: string
{
    case AWESOME = "awesome";
    case GOOD = "good";
    case OKAY = "okay";
    case DISAPPOINTING = "disappointing";
    case HORRIBLE = "horrible";
}
