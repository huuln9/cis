import 'package:flutter/material.dart';
import 'package:get/get.dart';

class Tgg extends StatelessWidget {
  const Tgg({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: TextButton(
            onPressed: () => Get.toNamed('/test'), child: Text('testt')),
      ),
    );
  }
}
