<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImageMergeController extends Controller
{
          public function display()
    {
        try {
            $image1Path = public_path('images/image1.jpg');
            $image2Path = public_path('images/image2.jpg');

            // Check if images exist
            if (!file_exists($image1Path) || !file_exists($image2Path)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Images not found in public/images folder'
                ], 404);
            }

            // Create ImageManager
            $manager = new ImageManager(new Driver());

            // Read both images
            $image1 = $manager->read($image1Path);
            $image2 = $manager->read($image2Path);

            // Get dimensions
            $width1 = $image1->width();
            $height1 = $image1->height();
            $width2 = $image2->width();
            $height2 = $image2->height();

            // Use max width
            $finalWidth = max($width1, $width2);

            // Resize images to same width
            if ($width1 != $finalWidth) {
                $image1->resize($finalWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $height1 = $image1->height();
            }

            if ($width2 != $finalWidth) {
                $image2->resize($finalWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $height2 = $image2->height();
            }

            // Calculate total height
            $finalHeight = $height1 + $height2;

            // Create blank canvas
            $mergedImage = $manager->create($finalWidth, $finalHeight)->fill('ffffff');

            // Place image1 at top
            $mergedImage->place($image1, 'top-left', 0, 0);

            // Place image2 below image1
            $mergedImage->place($image2, 'top-left', 0, $height1);

            // Save merged image
            $mergedDir = public_path('merged');
            if (!file_exists($mergedDir)) {
                mkdir($mergedDir, 0755, true);
            }

            $timestamp = time();
            $mergedFilename = 'merged_' . $timestamp . '.jpg';
            $mergedImage->save($mergedDir . '/' . $mergedFilename, 90);

            return view('display-images', [
                'mergedImagePath' => 'merged/' . $mergedFilename,
                'success' => true,
                'message' => 'Images loaded successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // API response (JSON)
    public function apiDisplay()
    {
        try {
            $image1Path = public_path('images/image1.jpg');
            $image2Path = public_path('images/image2.jpg');

            if (!file_exists($image1Path) || !file_exists($image2Path)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Images not found in public/images folder'
                ], 404);
            }

            // Create ImageManager
            $manager = new ImageManager(new Driver());

            // Read both images
            $image1 = $manager->read($image1Path);
            $image2 = $manager->read($image2Path);

            // Get dimensions
            $width1 = $image1->width();
            $height1 = $image1->height();
            $width2 = $image2->width();
            $height2 = $image2->height();

            // Use max width
            $finalWidth = max($width1, $width2);

            // Resize to same width
            if ($width1 != $finalWidth) {
                $image1->resize($finalWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $height1 = $image1->height();
            }

            if ($width2 != $finalWidth) {
                $image2->resize($finalWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $height2 = $image2->height();
            }

            // Calculate total height
            $finalHeight = $height1 + $height2;

            // Create and merge
            $mergedImage = $manager->create($finalWidth, $finalHeight)->fill('ffffff');
            $mergedImage->place($image1, 'top-left', 0, 0);
            $mergedImage->place($image2, 'top-left', 0, $height1);

            // Save
            $mergedDir = public_path('merged');
            if (!file_exists($mergedDir)) {
                mkdir($mergedDir, 0755, true);
            }

            $timestamp = time();
            $mergedFilename = 'merged_' . $timestamp . '.jpg';
            $mergedImage->save($mergedDir . '/' . $mergedFilename, 90);

            return response()->json([
                'success' => true,
                'message' => 'Images found',
                'data' => [
                    'merged_image' => asset('merged/' . $mergedFilename)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
