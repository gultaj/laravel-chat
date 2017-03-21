<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    public function _beforeSuite($settings = [])
    {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        copy(base_path('.env'), base_path('.env-backup'));
        copy(base_path('.env.testing'), base_path('.env'));
    }

    public function _afterSuite()
    {
        copy(base_path('.env-backup'), base_path('.env'));
        unlink(base_path('.env-backup'));
        \Illuminate\Support\Facades\Artisan::call('migrate:reset');
    }

    // public function _failed(\Codeception\TestInterface $test, $fail)
    // {
    //     $this->_afterSuite();
    // }
    
}
