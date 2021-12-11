import 'package:flutter/material.dart';
import 'package:get/get.dart';

class MenuList extends StatelessWidget {
  const MenuList({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: TextButton(
            onPressed: () => Get.toNamed('/test'), child: Text('testt')),
      ),
      // bottomNavigationBar: const CustomBottomNavigationBar(),
    );
  }
}
