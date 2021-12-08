import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens/views/splash.dart';
import 'package:vncitizens_home/vncitizens_home.dart';

void main() {
  runApp(
    GetMaterialApp(
      debugShowCheckedModeBanner: false,
      initialRoute: '/splash',
      getPages: [
        GetPage(name: '/', page: () => Home(listHomeMenuConfig: [])),
        GetPage(name: '/splash', page: () => const Splash()),
      ],
    ),
  );
}
