<?php

use Illuminate\Database\Schema\Blueprint;

function defaultAttribute(Blueprint $table)
{
    $table->integer('status')->default(1);
    $table->string('noted')->nullable();
    $table->timestamps();
}
